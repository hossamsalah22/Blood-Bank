<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;


class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(
                    1,
                    'login successfully',
                    [
                        'api_token' => $client->api_token,
                        'client' => $client,
                    ]
                );
            } else {
                return responseJson(0, 'Wrong Password');
            }
        } else {
            return responseJson(0, 'there is no Account associated with this number, click on register');
        }
    }
}
