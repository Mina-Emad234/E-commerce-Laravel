<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
            "slug"=>"required|unique:tags,slug,".$this->id,
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "slug.unique"=>__('admin/dashboard.edit_profile_slug_unique'),
        ];
    }
}
