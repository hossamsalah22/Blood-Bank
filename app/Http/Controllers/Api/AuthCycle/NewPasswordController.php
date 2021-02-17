<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewPasswordController extends Controller
{
    public function index(Request $request) 
    {
        $validator = Validator()->make(
            $request->all(), [
                'pin_code' => 'required',
                'phone' => 'required',
                'password' => 'required|confirmed',
            ]
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }

        $client = Client::where('pin_code', $request->pin_code)->where('phone', $request->phone)->first();
        if ($client) {
            $client->password = bcrypt($request->password);
            $client->pin_code = null;
            if ($client->save() ) {
                return responseJson(1, 'password changed successfully');
            } else {
                return responseJson(0, 'error, please try again later');
            }
        } else {
            return responseJson(0, 'the code is invalid');
        }
    }
}
