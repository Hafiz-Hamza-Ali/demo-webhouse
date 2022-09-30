<?php

namespace App\Http\Controllers;
use App\Services\MenuService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $view = 'admin.pages.menu';
    protected $route = 'admin.menus';

    public function __construct(MenuService $menuService)
    {
        // parent::__construct($menuService);
        $this->services=$menuService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->services->getModel()->get();
       
        return view("welcome", ['data' => $data ]);
    }
}
