<?php

namespace App\Http\Controllers\Api\MainCycle;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function index(Request $request)
    {
        $donations = DonationRequest::where(
            function ($query) use ($request)
            {
                if ($request->has('city_id')) {
                    $query->where('city_id', $request->city_id);
                } elseif ($request->has('blood_type_id')) {
                    $query->where('blood_type_id', $request->blood_type_id);
                }
            }
        )->get();

        return responseJson(1, 'success', $donations);
    }

    public function createRequest(Request $request)
    {
        $data = [
            'name' => 'required',
            'phone' => 'required|digits:11',
            'blood_type_id' => 'required|exists:blood_types,id',
            'hospital_name' => 'required',
            'patient_age' => 'required',
            'city_id' => 'required|exists:cities,id',
            'blood_bags_num' => 'required',
            'hospital_address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'note' => 'string',
        ];

        $validator = Validator()->make($request->all(), $data);
        if ($validator->fails() ) {
            return responseJson(0, $validator->errors()->first());
        }

        $donateRequest = $request->user()->donation_requests()->create($request->all());

        return responseJson(1, 'Request Added Successfully', $donateRequest->load('city'));
    }
}
