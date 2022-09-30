<?php

namespace App\Repositories;

use App\Model\Paypal;
use App\Repositories\BaseRepository;
use App\Interfaces\PaypalRepositoryInterface;

class PaypalRepository extends BaseRepository implements PaypalRepositoryInterface
{

   /**
    * ClaimRepository constructor.
    *
    * @param Claim $model
    */
   public function __construct(Paypal $model)
   {
       parent::__construct($model);
   }
   
}