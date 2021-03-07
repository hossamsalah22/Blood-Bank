<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'subject' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'please enter your email',
            'phone.required' => 'please enter your phone',
            'title.required' => 'please make title for your message',
            'subject.required' => 'please write your message',
        ];
    }
}
