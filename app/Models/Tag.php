<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;
    protected $translatedAttributes=['name'];

    protected $with=['translations'];
    protected $fillable=['slug'];
    protected $hidden=['translations'];

}
