<?php

namespace App\Repositories;

use App\Model\Subscription;
use App\Repositories\BaseRepository;
use App\Interfaces\SubscriptionRepositoryInterface;

class SubscriptionRepository extends BaseRepository implements SubscriptionRepositoryInterface
{

   /**
    * ClaimRepository constructor.
    *
    * @param Claim $model
    */
   public function __construct(Subscription $model)
   {
       parent::__construct($model);
   }
   
}