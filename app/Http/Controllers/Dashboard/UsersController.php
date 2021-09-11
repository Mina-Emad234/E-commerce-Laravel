<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

/**
 * admin create
 * Class UsersController
 * @package App\Http\Controllers\Dashboard
 */
class UsersController extends Controller
{
    public function index()
    {
        $users=Admin::where('id',"<>",auth()->id())->get();
        return view('dashboard.users.index', compact('users'));
    }

    public function create(){
        $roles=Role::get();
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(AdminRequest $request){
        try {
            $user=new Admin();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->role_id=$request->role_id;
            $user->save();
                return redirect()->route('admin.users')->with(['success' => __('admin/dashboard.admin_success_create_msg')]);

        }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

}
