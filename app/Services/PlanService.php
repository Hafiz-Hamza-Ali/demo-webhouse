<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\PlanRepositoryInterface;
use App\Services\BaseService;

class PlanService extends BaseService
{
    public function __construct(PlanRepositoryInterface $PlanRepository)
    {
        parent::__construct($PlanRepository);
    }
}
