<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'governorate_id' => 'required|exists:governorates,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter The Name Of The City',
            'governorate.required' => 'Please choose The Governorate Of The City',
        ];
    }
}
