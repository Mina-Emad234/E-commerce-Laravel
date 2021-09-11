<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BrandsRequest extends FormRequest
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
            'name' => 'required',
            "photo"=>"required_without:id|mimes:jpg,jpeg,png"
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "photo.required_without"=>__('admin/dashboard.brand_img_required'),
            "photo.mimes"=>__('admin/dashboard.brand_img_mimes'),

        ];
    }
}
