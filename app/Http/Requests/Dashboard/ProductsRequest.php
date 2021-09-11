<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            "slug"=>"required|unique:products,slug,".$this->id,
            'description'=>'required|max:1800',
            "short_description"=>'nullable|max:500',
            'brand_id'=>'required|exists:brands,id',

        ];
    }
    public function messages()
    {
        return[
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "slug.unique"=>__('admin/dashboard.edit_profile_slug_unique'),
            "description.max"=>__('admin/dashboard.pro_desc_max'),
            "short_description.max"=>__('admin/dashboard.pro_short_desc_max'),
            "brand_id.exists"=>__('admin/dashboard.pro_brand_exists'),

        ];
    }
}
