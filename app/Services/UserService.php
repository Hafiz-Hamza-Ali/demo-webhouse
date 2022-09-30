<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        if($request['password'] == ''){
            $input = $request->except('password', 'password_confirmation');
        }
        return $this->repository->update($id, $input);
    }
}
