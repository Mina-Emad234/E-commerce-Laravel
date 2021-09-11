<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\UniqueAttributeName;
use Illuminate\Foundation\Http\FormRequest;

class AttributesRequest extends FormRequest
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
            "name"=>["required","max:100",new UniqueAttributeName($this->id)]
        ];
    }
    public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "max"=>__('admin/dashboard.attr_validation_max')
        ];
    }
}
