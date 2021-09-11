<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RolesRequest;
use App\Http\Requests\Dashboard\TagsRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * create &update roles
 * Class RolesController
 * @package App\Http\Controllers\Dashboard
 */
class RolesController extends Controller
{
    public function index()
    {
       $roles=Role::get();
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create(){
        return view('dashboard.roles.create');
    }

    public function store(RolesRequest $request){
        try {
            $role = $this->process(new Role, $request);

                return redirect()->route('admin.roles')->with(['success' => __('admin/dashboard.role_success_create_msg')]);


        }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }
    }

    public function edit($id){
        $role=Role::find($id);
        if (!$role)
            return redirect()->route('admin.tags')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
        return view('dashboard.roles.edit', compact('role'));
    }

    public function update($id,RolesRequest $request){
        try {
            $role = Role::find($id);
            if (!$role)
                return redirect()->route('admin.tags')->with(['error' => __('admin/dashboard.edit_category_edit_err_msg')]);
            $role = $this->process($role, $request);
                return redirect()->route('admin.roles')->with(['error' => __('admin/dashboard.role_updated_success_msg')]);
        }catch (\Exception $ex) {
//         return $ex;
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => __('admin/dashboard.category_error_create_msg')]);
        }

    }

    public function process(Role $role,Request $r)
    {
        $role->name=$r->name;
        $role->permissions=json_encode($r->permissions);
        $role->save();
        return $role;
    }
}
