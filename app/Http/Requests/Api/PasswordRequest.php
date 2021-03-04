<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'pin_code' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'pin_code.required' => 'Please Enter The Code we Have Sent on your Email',
            'phone.required' => 'please Enter your phone number',
            'password.required' => 'please enter your new password',
            'password.confirmed' => 'password Does not match'
        ];
    }
}