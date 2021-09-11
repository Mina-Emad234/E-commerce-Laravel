<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
            "attribute_id"=>"required|exists:attributes,id",
            "name"=>"required|max:100",
            "price"=>"required|numeric|min:0",
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "max"=>__('admin/dashboard.option_validation_max'),
            "numeric"=>__('admin/dashboard.shipping_numeric'),
            'exists'=>__('admin/dashboard.pro_option_exists'),
            "min"=>__('admin/dashboard.pro_option_min'),
        ];
    }
}
