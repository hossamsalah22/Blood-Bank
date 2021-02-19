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
                    if ($request->has('blood_type_id')) {
                        $query->where('blood_type_id', $request->blood_type_id);
                    }
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
        ];

        $validator = Validator()->make($request->all(), $data);
        if ($validator->fails() ) {
            return responseJson(0, $validator->errors()->first());
        }

        $donateRequest = $request->user()->donation_requests()
            ->create($request->all());

        $clientsIDs = $donateRequest->city->governorate
            ->clients()->whereHas(
                'blood_types', function ($query) use ($request) {
                    $query->where('blood_type_id', $request->blood_type_id);
                }
            )->pluck('clients.id')->toArray();

        // Create Notifications on DB
        if (count($clientsIDs)) {
            $dNotification = $donateRequest->notifications()->create(
                [
                    'title' => 'Donation Request NearBy',
                    'content' => 'Need Donator for Blood Type ' . $donateRequest->blood_type->name ,
                    'donation_request_id' => $donateRequest->id,
                ]
            );
            
            // Attach Clients to the notificatrion
            $dNotification->clients()->attach($clientsIDs);
        }
        
        return responseJson(1, 'Request Added Successfully', $donateRequest->load('city'));
    }
}
