<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\PaypalRepositoryInterface;
use App\Services\BaseService;

class PaypalService extends BaseService
{
    public function __construct(PaypalRepositoryInterface $PaypalRepository)
    {
        parent::__construct($PaypalRepository);
    }
}
