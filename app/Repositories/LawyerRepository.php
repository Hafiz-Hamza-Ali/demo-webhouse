<?php

namespace App\Repositories;

use App\Model\Lawyer;
use App\Repositories\BaseRepository;
use App\Interfaces\LawyerRepositoryInterface;

class LawyerRepository extends BaseRepository implements LawyerRepositoryInterface
{

    /**
     * ClaimRepository constructor.
     *
     * @param Claim $model
     */
    public function __construct(Lawyer $model)
    {
        parent::__construct($model);
    }

    public function getLawyerByEmail($email)
    {   
        return $this->model->where('email_address', $email);
    }
}
