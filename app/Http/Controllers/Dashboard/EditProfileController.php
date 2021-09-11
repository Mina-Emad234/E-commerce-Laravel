<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EditProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

/**
 * edit & update profile
 * Class EditProfileController
 * @package App\Http\Controllers\Dashboard
 */
class EditProfileController extends Controller
{
    public function editProfile(){
        $admin=Admin::find(auth('admin')->user()->id);
        return view('dashboard.profile.edit-profile',compact('admin'));
    }
    public function updateProfile(EditProfileRequest $request){
        try{
            $admin=Admin::find(auth('admin')->user()->id);
            if($request->filled('password')){
                $request->merge(['password'=>bcrypt($request->password)]);
            }else{
                unset($request['password']);
            }
            unset($request['id']);
            unset($request['current_password']);
            unset($request['password_confirmation']);//delete unneeded requests
            $admin->update($request->all());//update
            return redirect()->back()->with(['success'=>__('admin/dashboard.profile_success_msg')]);
        }catch (\Exception $ex) {
//         return $ex;
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.profile_error_msg')]);
        }
    }
}
