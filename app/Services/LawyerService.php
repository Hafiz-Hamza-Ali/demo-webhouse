<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\LawyerRepositoryInterface;
use App\Services\BaseService;
use App\Repositories\PasswordResetRepository;
use App\Repositories\PlanRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountActivationNotificationMail;
use stdClass;

class LawyerService extends BaseService
{
    protected $passwordResetRepository;
    protected $planRepository;
    protected $subscriptionRepository;

    public function __construct(LawyerRepositoryInterface $lawyerRepository, PasswordResetRepository $passwordResetRepository, PlanRepository $planRepository, SubscriptionRepository $subscriptionRepository)
    {
        parent::__construct($lawyerRepository);
        $this->passwordResetRepository = $passwordResetRepository;
        $this->planRepository = $planRepository;
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function store(Request $request)
    {
        // before save all data, we should apply payment gateway functionality.

        $input = $request->all();
        $input['specialist_areas'] = implode(",", $input['specialist_areas']);
        $resp = $this->repository->store($input);
        if(isset($input['plan_id'])){
        $this->storeLawyerSubscription($resp->id, $input['plan_id']);
        }
        $entity = $this->passwordResetRepository->forgotPassword($resp);
        $resp->link =  route('lawyer.reset.password.form') . '?token=' . $entity->passwordReset->token . '&type=activate';

        // send mail to Lawyer for activation account
        $data = new stdClass;
        $data->data = $resp;
        Mail::to($data->data->email_address)->send(new AccountActivationNotificationMail($data));
        return $resp;
    }

    public function getLawyerByEmail($email)
    {
        return $this->repository->getLawyerByEmail($email);
    }

    public function storeLawyerSubscription($lawyerId, $planId)
    {
        $plan = $this->planRepository->find($planId);
        $subscription['lawyer_id'] = $lawyerId;
        $subscription['plan_id'] = $planId;
        $subscription['plan_ends_at'] = Carbon::now()->addMonths($plan->month);
        return $this->subscriptionRepository->store($subscription);
    }

    public function getLawyerByEmailAndSraId($email, $sraId)
    {
        return $this->repository->whereMultiple([['email_address', '=', $email], ['sra_id', '=', $sraId]]);
    }
}
