<?php

namespace App\Services;

use App\Interfaces\PasswordResetRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Http\Request;
use App\Repositories\LawyerRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordNotificationMail;
use stdClass;

class PasswordResetService extends BaseService
{
    protected $LawyerRepository;

    public function __construct(PasswordResetRepositoryInterface $PasswordResetRepository, LawyerRepository $LawyerRepository)
    {
        parent::__construct($PasswordResetRepository);
        $this->LawyerRepository = $LawyerRepository;
    }

    public function forgotPassword(Request $request)
    {
        $baseUrl = '';
        $response = new stdClass();

        $entity = $this->LawyerRepository->getLawyerByEmail($request->input('email'))->first();
        $baseUrl = config('app.url') . '/' . $request->input('entity') . '/reset-password?&type=' . $request->input('entity') . '&token=';

        if (empty($entity)) {
            $response->message = 'The email does not exist';
            $response->alert_class = 'alert-danger';
            return $response;
        }
        $entity = $this->repository->forgotPassword($entity);
        $entity->link = $baseUrl . $entity->passwordReset->token;

        // send reset email
        $data = new stdClass;
        $data->data = $entity;
        Mail::to($data->data->email_address)->send(new ResetPasswordNotificationMail($data));
        $response->message = 'An email has been sent to your email address. Follow the instruction to reset password';
        $response->alert_class = 'alert-success';

        return $response;
    }

    public function resetPassword(Request $request)
    {
        $response = new stdClass();
        $token = $request->input('reset_token');
        $entity = $this->getEntityByToken($token);

        if (!$entity) {
            $response->message = 'Your password reset link has expired';
            $response->alert_class = 'alert-danger';
            return $response;
        }

        $entity->resetable->password = Hash::make($request->input('password'));
        $entity->resetable->update();
        $entity->whereToken($token)->delete();

        $response->message = 'Password has been changed successfully';
        $response->alert_class = 'alert-success';

        return $response;
    }

    public function accountActivate(Request $request)
    {
        $response = new stdClass();
        $token = $request->input('reset_token');
        $entity = $this->getEntityByToken($token);

        if (!$entity) {
            $response->message = 'Activation link has expired, please make request to forgot password';
            $response->alert_class = 'alert-danger';
            return $response;
        }

        $entity->resetable->password = Hash::make($request->input('password'));
        $entity->resetable->update();
        $entity->whereToken($token)->delete();

        $response->message = 'Account has been activated successfully.';
        $response->alert_class = 'alert-success';

        return $response;
    }

    public function getEntityByToken($token)
    {
        return $this->repository->getEntityByToken($token);
    }
}
