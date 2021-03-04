<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'subject' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Enter Your Phone Number',
            'email.required' => 'Enter Your email',
            'title.required' => 'Enter Title For Your Message',
            'subject.required' => 'Enter Your Message',
        ];
    }
}
