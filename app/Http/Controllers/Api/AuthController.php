<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator()->make($request->all(), [
            'name' => 'required|max:25',
            'phone' => 'required|unique:clients',
            'email' => 'required|email|unique:clients',
            'password' => 'required|min:6|confirmed',
            'last_donation' => 'required',
            'd_o_b' => 'required',
            'city_id' => 'required',
            'blood_type_id' => 'required',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        return responseJson(1, 'Register Successfull',[
            'api_token' => $client->api_token,
            'client' => $client,
        ]);
    }

    public function login( Request $request) 
    {
        $validator = Validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client )
        {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(1, 'login Successfully', [
                    'api_token' => $client->api_token,
                    'client' => $client,
                ]);
            } else {
                return responseJson(0, 'Wrong Password');
            }
        } else {
            return responseJson(0, 'There is no account associated with this number');
        }        
    }

    public function forgot( Request $request) 
    {
        $validator = Validator()->make($request->all(), [
            'phone' => 'required',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client )
        {
            $code = rand(0001, 9999);
            $update = $client->update(['pin_code' => $code]);
            if ($update) {
                return responseJson(1, 'Message Sent', $code);
            } else {
                return responseJson(0, 'error, please try again');
            }
            
        } else {
            return responseJson(0, 'There is no account associated with this number');
        }        
    }
}
