<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'sku'=>'nullable|min:3|max:10',
            'manage_stock'=>'required|in:0,1',
            'in_stock'=>'required|in:0,1',
            'qty'=>'required_if:manage_stock,==,1',
            'categories'=>'array|min:1',
            'categories.*'=>'numeric|exists:categories,id',
            'tags'=>'nullable',
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            'min'=>__('admin/dashboard.pro_sku_min'),
            'max'=>__('admin/dashboard.pro_sku_max'),
            'required_if'=>__('admin/dashboard.pro_qty_req'),
            'exists'=>__('admin/dashboard.pro_cat_exists'),
        ];
    }
}
