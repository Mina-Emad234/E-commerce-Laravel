<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminLoginRequest;

/**
 * admin login & logout
 * Class LoginController
 * @package App\Http\Controllers\Dashboard
 */
class LoginController extends Controller
{
   public function getLogin(){
       return view('dashboard.auth.login');
   }
   public function postLogin(AdminLoginRequest $request){
//       return $request;
       //check credentials
    $remember_me = $request->has('remember_me') ? true : false;
    if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember_me)){
        return redirect()->route('admin.dashboard');
    }
    return redirect()->back()->withInput()->with(['error'=>__('admin/auth.login_error_msg')]);
   }

   public function logout(){
       $guard=$this->getGuard();
       $guard->logout();
       return redirect()->route('admin.login');
   }

   public function getGuard(){
       return auth('admin');
   }
}
