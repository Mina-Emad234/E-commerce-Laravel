<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatedAttributes=['name'];

    protected $with=['translations'];
    protected $fillable=['parent_id','slug','is_active'];
    protected $hidden=['translations'];
    protected $casts=['is_active'=>'boolean'];


    public function scopeParent($query){
        return $query->whereNull('parent_id');
    }
    public function scopeChild($query){
        return $query->whereNotNull('parent_id');
    }

    public function _parent(){
        return $this->belongsTo(self::class,'parent_id','id');
    }
    public function _child(){
        return $this->hasOne(self::class,'parent_id','id');
    }

    public function getActive(){
        return $this-> is_active == 1 ? __('admin/dashboard.index_category_category_active') : __('admin/dashboard.index_category_category_inactive');
    }

    /**
     * use observer on deleting process
     *
     */
    protected static function boot()
    {
        parent::boot();
        Category::observe(CategoryObserver::class);
    }
    public function subCats()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function scopeActive($query){
        return $query->where('is_active',1);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories');
    }

}
