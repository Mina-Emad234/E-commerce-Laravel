<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;

    protected $translatedAttributes = ['name'];

    protected $with = ['translations'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(){
        return $this->hasMany(Option::class,'attribute_id');
    }
}
