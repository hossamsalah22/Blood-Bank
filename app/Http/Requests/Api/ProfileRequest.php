<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
                'password' => 'confirmed',
                'email' => Rule::unique('clients', 'email')
                    ->ignore($this->user()->id),
                'phone' => Rule::unique('clients', 'phone')
                    ->ignore($this->user()->id),
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'password does not match',
            'email.unique' => 'this email belongs to another account',
            'phone.unique' => 'this phone already have an account'
        ];
    }
}
