<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\CheckValue;
use Illuminate\Foundation\Http\FormRequest;

class MainCategoriesRequest extends FormRequest
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
            "slug"=>"required|unique:categories,slug,".$this->id,
            "parent_id"=>"required_without:id"
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "slug.unique"=>__('admin/dashboard.edit_profile_slug_unique'),
            "parent_category.required"=>__('admin/dashboard.parent_category_required'),
        ];
    }
}
