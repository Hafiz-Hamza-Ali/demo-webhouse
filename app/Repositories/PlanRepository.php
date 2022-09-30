<?php

namespace App\Repositories;

use App\Model\Plan;
use App\Repositories\BaseRepository;
use App\Interfaces\PlanRepositoryInterface;

class PlanRepository extends BaseRepository implements PlanRepositoryInterface
{

   /**
    * ClaimRepository constructor.
    *
    * @param Claim $model
    */
   public function __construct(Plan $model)
   {
       parent::__construct($model);
   }

}
