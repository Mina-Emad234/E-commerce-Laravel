<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeVerification extends Model
{
    public $table='code_verifications';
    protected $fillable=['user_id','code','created_at','updated_at'];
}
