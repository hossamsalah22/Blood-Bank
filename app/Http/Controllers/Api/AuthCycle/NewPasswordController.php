<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\Api\PasswordRequest;

class NewPasswordController extends Controller
{
    public function index(PasswordRequest $request)
    {
        $client = Client::where('pin_code', $request->pin_code)->where('phone', $request->phone)->first();
        if ($client) {
            $client->password = bcrypt($request->password);
            $client->pin_code = null;
            if ($client->save()) {
                return responseJson(1, 'password changed successfully');
            } else {
                return responseJson(0, 'error, please try again later');
            }
        } else {
            return responseJson(0, 'the code is invalid');
        }
    }
}
