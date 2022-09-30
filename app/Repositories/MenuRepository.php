<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\BaseRepository;
use App\Interfaces\MenuRepositoryInterface;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{

   /**
    * ClaimRepository constructor.
    *
    * @param Claim $model
    */
   public function __construct(Menu $model)
   {
       parent::__construct($model);
   }

}
