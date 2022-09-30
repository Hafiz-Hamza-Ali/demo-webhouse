<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\SubscriptionRepositoryInterface;
use App\Services\BaseService;

class PlanService extends BaseService
{
    public function __construct(SubscriptionRepositoryInterface $SubscriptionRepository)
    {
        parent::__construct($SubscriptionRepository);
    }

    public function store($input)
    {
        return $this->repository->store($input);
    }
}
