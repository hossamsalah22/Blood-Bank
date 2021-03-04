<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current-password' => 'required',
            'new-password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'current-password.required' => 'Please Enter your Current Password', 
            'new-password.required' => 'Please Enter your New Password', 
            'new-password.confirmed' => 'Password Confirmation Does not Match', 
        ];
    }
}
