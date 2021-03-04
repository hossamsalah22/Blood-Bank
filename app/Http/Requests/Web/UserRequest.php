<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password' => 'required|confirmed',
            'email' => 'required',
            'list_roles' => 'required' 
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Enter the user name',
            'password.required' => 'Enter the user password',
            'password.confirmed' => 'password confirmation does not match',
            'email.required' => 'Enter the user email',
            'list_roles.required' => 'Select at least one Role for This User',
        ];
    }
}
