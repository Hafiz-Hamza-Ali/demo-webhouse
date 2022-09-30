<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Traits\ControllerHelper;
class BaseController extends Controller
{

    protected $Service;
    use ControllerHelper;

    public function __construct($Service)
    {
        $this->Service = $Service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->Service->paginate();
        return view("{$this->view}.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->view}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $this->getRequest($request);
        $this->Service->store($request);
        Session::flash('message', 'Record has been created successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route("{$this->route}.index"));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->Service->getModel()->get();
        return view("{$this->view}.index", ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->Service->find($id);
        return view("{$this->view}.edit", ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Service->find($id)->delete();
        Session::flash('message', 'Record has been deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route("{$this->route}.index"));
    }

    protected function getRequest($action)
    {
        if (!isset($this->validation)) {
            return request();
        }

        if (isset($this->validation[$action])) {
            return resolve($this->validation[$action]);
        }

        return resolve($this->validation);
    }

    public function getUser()
    {
        return auth()->guard('lawyer')->user() ? auth()->guard('lawyer')->user() : null;
    }

    public function checkAuthUser()
    {
        return $this->getUser() ? true : false;
    }
}
