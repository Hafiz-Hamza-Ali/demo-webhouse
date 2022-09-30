<?php

namespace App\Http\Controllers\Admin;

use App\Services\MenuService;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends BaseController
{
    protected $view = 'admin.pages.menu';
    protected $route = 'admin.menus';

    public function __construct(MenuService $menuService)
    {
        parent::__construct($menuService);
    }

    public function index(Request $request)
    {
        $data = $this->Service->getModel()->get();
       
        return view("{$this->view}.index", ['data' => $data ]);
    }

    public function edit($id)
    {
        $data = $this->Service->getModel()->find($id);
        return view("{$this->view}.edit", ['data' => $data]);
    }
    public function update(Request $request, $menu)
    {
        
        $request = $this->getRequest($request);
        $this->Service->update($request, $id);
        Session::flash('message', 'Record has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route("admin.menus.index"));
    }

    
}
