<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            "name"=>"required",
            "email"=>"required|email|unique:admins,email,".$this->id,
            "password"=>"nullable|confirmed|min:8|required_with:current_password"
        ];
    }
        public function messages()
    {
        return [
            "required"=>__('admin/dashboard.edit_profile_field_required'),
            "email"=>__('admin/dashboard.edit_profile_validate_email'),
            "unique"=>__('admin/dashboard.edit_profile_email_unique'),
            "confirmed"=>__('admin/dashboard.edit_profile_confirm_pass'),
            "min"=>__('admin/dashboard.edit_profile_min_pass_validation'),
            "password.required_with"=>__('admin/dashboard.edit_profile_new_pass_require'),
        ];
    }

}
