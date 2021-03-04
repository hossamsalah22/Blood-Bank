<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:25',
            'phone' => 'required|unique:clients',
            'email' => 'required|email|unique:clients',
            'password' => 'required|min:6|confirmed',
            'last_donation' => 'required',
            'd_o_b' => 'required',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter your name',
            'email.required' => 'Please Enter your email',
            'email.unique' => 'This email have an account, click on reset password',
            'phone.required' => 'Please Enter your phone number',
            'phone.unique' => 'This phone is already taken',
            'password.required' => 'Password Field is required',
            'password.confirmed' => "Password Doesn't match",
            'last_donation.required' => "please enter your last donation date",
            'd_o_b.required' => "please enter your Birth date",
            'city_id.required' => "please Select city",
            'blood_type_id.required' => "please Select your Blood Type",
        ];
    }
}
