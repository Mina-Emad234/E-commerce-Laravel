<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\DeterminEndDate;
use Illuminate\Foundation\Http\FormRequest;

class ProductPriceRequest extends FormRequest
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
            'price'=>'required|min:8|numeric',
            'special_price'=>'nullable|numeric',
            'special_price_type'=>'required_with:special_price|in:fixed,percent',
            'special_price_start'=>'required_with:special_price',
            'special_price_end'=>['required_with:special_price',new DeterminEndDate($this->special_price_start)],
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "price.min"=>__('admin/dashboard.pro_min'),
            "numeric"=>__('admin/dashboard.shipping_numeric'),
            "required_with"=>__('admin/dashboard.pro_req'),
        ];
    }
}
