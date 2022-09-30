<?php

namespace App\Http\Controllers\Admin;

use App\Services\UserService;
use App\Models\User;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Support\Carbon;

class UserController extends BaseController
{
    protected $view = 'admin.pages.user';
    protected $route = 'admin.users';
    protected $validation = AdminUserRequest::class;

    public function __construct(UserService $userService)
    {
        parent::__construct($userService);
    }
    public function index(Request $request)
    {
        $data = $this->Service->paginate();
        return view("admin.pages.menu.index", ['data' => $data]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $request->merge([
            'password' => Hash::make($request->input('password'))
        ]);
        $this->Service->store($request);
        Session::flash('message', 'Record has been created');
        Session::flash('alert-class', 'alert-success');
        return redirect(route("{$this->route}.index"));
    }

    public function update(Request $request, $id)
    {

        $this->getRequest('update');
        if ($request->password != '') {
            $request->merge([
                'password' => Hash::make($request->input('password'))
            ]);
        } else {
            $request->except('password');
        }
        $this->Service->update($request, $id);
        Session::flash('message', 'Record has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route("{$this->route}.index"));
    }

    public function destroy($id)
    {
        $user = $this->Service->find($id);

        if ($user->email == config('mail.admin_email')) {
            Session::flash('message', 'The super admin can not be deleted.');
            Session::flash('alert-class', 'alert-danger');
            return redirect(route("{$this->route}.index"));
        }

        $user->delete();
        Session::flash('message', 'Record has been deleted successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route("{$this->route}.index"));
    }

    public function login(Request $request)
    {
        $credentials = $request->only( 'password', 'email_address');

        $userData = User::where('email', "=", $credentials['email_address'])->first();
        //dd($userData);
        if (isset($userData)) {
            $credentials=[
                "email"=>$credentials['email_address'],
                "password"=>$credentials['password'],
                
            ];
            // return $credentials;
            
                if (auth()->attempt($credentials)) {
                    //dd('hh');
                    return redirect(route('admin.users.index'));
                }

                Session::flash('email', true);
                Session::flash('pass_msg', true);
                return back();
          
        } else {
            Session::flash('email', true);
                Session::flash('pass_msg', true);
                return back();
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login.form'));
    }
}
