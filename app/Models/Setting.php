<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;
    protected $translatedAttributes=['value'];

    protected $with=['translations'];
    protected $fillable=['key','is_translatable','plain_value'];
    protected $casts=['is_translatable'=>'boolean'];

    /**
     * set key & value of settings
     * @param $settings
     */

    public static function setMany($settings){
        foreach ($settings as $key => $value){

            self::set($key,$value);
        }
    }

    /**
     * set given settings contains translatable settings
     * @param $key
     * @param $value
     * @return mixed
     */

    public static function set($key,$value){
        if($key === 'translatable'){
            return static::setTranslatableSettings($value);
        }
        if (is_array($value)){
           $value = json_encode($value);
        }
         static::updateOrCreate(['key'=>$key],['plain_value'=>$value]);
    }

    /**
     * set translatable settings
     *
     * @param array $settings
     * @return mixed
     */

    public static function setTranslatableSettings($settings=[]){
        foreach ($settings as $key => $value){
            return static::updateOrCreate(['key'=>$key],[
                'is_translatable'=>true,
                'value'=>$value
            ]);
        }
    }
}
