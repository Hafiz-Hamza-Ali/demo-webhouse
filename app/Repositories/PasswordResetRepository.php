<?php

namespace App\Repositories;

use App\Model\PasswordReset;
use App\Repositories\BaseRepository;
use App\Interfaces\PasswordResetRepositoryInterface;
use Illuminate\Support\Carbon;

class PasswordResetRepository extends BaseRepository implements PasswordResetRepositoryInterface
{

    /**
     * ClaimRepository constructor.
     *
     * @param Claim $model
     */
    public function __construct(PasswordReset $model)
    {
        parent::__construct($model);
    }

    public function forgotPassword($entity)
    {
        $entity->passwordReset()->delete();
        $passwrodReset = new PasswordReset;
        $passwrodReset->email  = $entity->email_address;
        $passwrodReset->token = bin2hex(random_bytes(72));
        $passwrodReset->created_at = Carbon::now();
        $passwrodReset->timestamps = false;
        $entity->passwordReset()->save($passwrodReset);

        return $entity;
    }

    public function getEntityByToken($token){
        return $this->model->whereToken($token)->first();
    }
}
