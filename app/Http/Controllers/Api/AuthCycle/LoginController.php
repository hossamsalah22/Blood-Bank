<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;


class LoginController extends Controller
{
    public function index( Request $request)
    {
        $validator = Validator()->make(
            $request->all(), [
                'phone' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(
                    1, 'login successfully', [
                    'api_token' => $client->api_token,
                    'client' => $client,
                    ]
                );
            } else {
                return responseJson(0, 'Wrong Password');
            }
        } else {
            return responseJson(0, 'there is no phone associated with this number please try again');
        }
    }
}
