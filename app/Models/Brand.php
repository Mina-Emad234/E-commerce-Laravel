<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;
    protected $translatedAttributes=['name'];

    protected $with=['translations'];
    protected $fillable=['is_active','photo'];
    protected $hidden=['translations'];
    protected $casts=['is_active'=>'boolean'];

    /**
     * return "active" if is_active column == 1
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getActive(){
        return $this-> is_active == 1 ? __('admin/dashboard.index_category_category_active') : __('admin/dashboard.index_category_category_inactive');
    }

    public function getPhotoAttribute($val){
        return !$val==null?asset('assets/images/brands/'.$val):"";
    }

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

}
