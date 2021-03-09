<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class CreateDonationRequest extends FormRequest
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
            'phone' => 'required',
            'blood_type_id' => 'required',
            'hospital_name' => 'required',
            'patient_age' => 'required|integer',
            'blood_bags_num' => 'required|integer',
            'hospital_address' => 'required',
            'client_id' => 'required',
            'city_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'please enter the name of the patient',
            'phone.required' => 'please enter the phone of the patient',
            'blood_type_id.required' => 'please choose the blood type of the patient',
            'hospital_name.required' => 'please enter the hospital name',
            'patient_age.required' => 'please enter the age of the patient',
            'patient_age.integer' => 'invaild number',
            'blood_bags_num.required' => 'please enter the number of required blood bags',
            'blood_bags_num.integer' => 'nvaild number',
            'hospital_address.required' => 'please enter the address of the hospital',
            'client_id.required' => 'please enter your name',
            'city_id.required' => 'please choose the city of the patient',
        ];
    }
}
