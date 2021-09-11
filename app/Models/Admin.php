<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table="admins";
    protected $guarded=[];
    public $timestamps=true;
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    /**
     * used for check roles & permissions
     *
     * @param $permissions
     * @return bool
     */
    public function hasAbility($permissions)
    {
        $role=$this->role;
        if(!$role){
            return false;
        }
        foreach ($role->permissions as $permission)
        {
            if(is_array($permissions) && in_array($permission,$permissions)){
                return true;
            }elseif (is_string($permissions) && strcmp($permissions,$permission) == 0){
                return true;
            }
        }
        return false;
    }
}
