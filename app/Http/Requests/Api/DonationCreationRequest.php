<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DonationCreationRequest extends FormRequest
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
            'phone' => 'required|digits:11',
            'blood_type_id' => 'required|exists:blood_types,id',
            'hospital_name' => 'required',
            'patient_age' => 'required',
            'city_id' => 'required|exists:cities,id',
            'blood_bags_num' => 'required',
            'hospital_address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter The Patient Name',
            'phone.required' => 'Please Enter The Patient Phone',
            'blood_type_id.required' => 'Please Choose The Patient Blood Type',
            'hospital_name.required' => 'Please Enter The Hospital Name',
            'patient_age.required' => 'Please Enter The Patient Age',
            'city_id.required' => 'Please Choose The Patient City',
            'blood_bags_num.required' => 'Please Enter The Required Blood Bags',
            'hospital_address.required' => 'Please Enter The Hospital Address',
        ];
    }
}
