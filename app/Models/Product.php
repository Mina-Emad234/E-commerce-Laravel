<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes,Translatable;
    protected $translatedAttributes=['name','description','short_description'];

    protected $with=['translations'];
    protected $fillable=[
        'brand_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active'];
//    protected $table = 'advisor_check';

    protected $hidden=['translations'];
    protected $casts=['manage_stuck'=>'boolean','in_stock'=>'boolean','is_active'=>'boolean'];
    protected $dates=[ 'special_price_start', 'special_price_end','start_date','end_date',"deleted_at"];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id')->withDefault();
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'product_categories');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags');
    }

    public function getActive()
    {
        return $this-> is_active == 1 ? __('admin/dashboard.index_category_category_active') : __('admin/dashboard.index_category_category_inactive');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function options(){
        return $this->hasMany(Option::class,'product_id');
    }
    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    /**
     * check stock quantity
     *
     * @param $quantity
     * @return bool
     */
    public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    /**
     * return stock if quantity exceeded
     * @return bool
     */
    public function outOfStock()
    {
        return $this->qty === 0;
    }

    /**
     * check stock
     *
     * @return bool
     */
    public function inStock()
    {
        return $this->qty >= 1;
    }

    /**
     * check special price if not exists
     * @param bool $converted
     * @return mixed
     */
    public function getTotal($converted = true)
    {
        return $total =  $this->special_price ?? $this -> price;

    }



}
