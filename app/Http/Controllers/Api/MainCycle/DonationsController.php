<?php

namespace App\Http\Controllers\Api\MainCycle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationCreationRequest;
use App\Models\DonationRequest;
use App\Models\Token;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function index(Request $request)
    {
        $donations = DonationRequest::where(
            function ($query) use ($request) {
                if ($request->has('city_id')) {
                    if ($request->has('blood_type_id')) {
                        $query->where('blood_type_id', $request->blood_type_id)
                            ->where('city_id', $request->city_id);
                    } else {
                        $query->where('city_id', $request->city_id);
                    }
                } elseif ($request->has('blood_type_id')) {
                    $query->where('blood_type_id', $request->blood_type_id);
                }
            }
        )->get();

        return responseJson(1, 'success', $donations);
    }

    public function createRequest(DonationCreationRequest $request)
    {
        $donateRequest = $request->user()->donation_requests()
            ->create($request->all());

        $clientsIDs = $donateRequest->city->governorate
            ->clients()->whereHas(
                'blood_types',
                function ($query) use ($request) {
                    $query->where('blood_type_id', $request->blood_type_id);
                }
            )->pluck('clients.id')->toArray();

        // Create Notifications on DB
        if (count($clientsIDs)) {
            $dNotification = $donateRequest->notifications()->create(
                [
                    'title' => 'Donation Request NearBy',
                    'content' => 'Need Donator for Blood Type ' . $donateRequest->blood_type->name,
                    'donation_request_id' => $donateRequest->id,
                ]
            );

            // Attach Clients to the notificatrion
            $dNotification->clients()->attach($clientsIDs);

            $tokens = Token::whereIn('client_id', $clientsIDs)
                ->where('token', '!=', null)
                ->pluck('token')->toArray();

            if (count($tokens)) {
                $title = $dNotification->title;
                $body = $dNotification->content;
                $data = [
                    'donation_request_id' => $donateRequest->id,
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info('result: ' . $send);
            }
        }
        return responseJson(1, 'Request Added Successfully', $donateRequest);
    }
}
