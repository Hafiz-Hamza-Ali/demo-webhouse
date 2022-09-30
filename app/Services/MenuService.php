<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\MenuRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Support\Facades\Mail;


class MenuService extends BaseService
{

    protected $lawyerRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        parent::__construct($menuRepository);
    }


}
