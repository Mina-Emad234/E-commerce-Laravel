<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'mobile_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'mobile_verified_at' => 'datetime',
    ];
    public function codes(){
        return $this->hasMany(CodeVerification::class,'user_id','id');
    }
    public function wishLists(){
        return $this->belongsToMany(Product::class,'wish_lists')->withTimestamps();
    }

    /**
     * check if product is exists on this table
     *
     * @param $productId
     * @return bool
     */
    public function wishListsHas($productId){
        return self::wishlists()->where('product_id',$productId)->exists();
    }

}
