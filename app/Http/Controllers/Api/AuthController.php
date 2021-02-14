<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Str;

class AuthController extends Controller
{
    // Register New Client 
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
        $govern = Governorate::where($request->city_id);
        $client->governorates()->attach($govern->governorate_id);
        // $bloodtype = BloodType::where('name', $request->blood_type_id)->first();
        $client->blood_types()->attach($request->blood_type_id);
        return responseJson(
            1, 'Register Successfull', [
            'api_token' => $client->api_token,
            'client' => $client,
            ]
        );
    }

    // Login Function
    public function login( Request $request) 
    {
        $validator = Validator()->make(
            $request->all(), [
            'phone' => 'required',
            'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client ) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(
                    1, 'login Successfully', [
                    'api_token' => $client->api_token,
                    'client' => $client,
                    ]
                );
            } else {
                return responseJson(0, 'Wrong Password');
            }
        } else {
            return responseJson(0, 'There is no account associated with this number');
        }        
    }

    public function reset( Request $request) 
    {
        $validator = Validator()->make(
            $request->all(), [
            'phone' => 'required',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client )
        {
            $code = rand(1111, 9999);
            $update = $client->update(['pin_code' => $code]);
            if ($update) {
                Mail::to($client->email)
                    ->bcc("hossamsalahabbas@gmail.com")
                    ->send(new ResetPassword($code));
                return responseJson(1, 'Your Reset code sent Successsfully ,please check your email');
            } else {
                return responseJson(0, 'error, please try again');
            }
        } else {
            return responseJson(0, 'There is no account associated with this number');
        }        
    }

    public function password( Request $request) 
    {
        $validator = Validator()->make(
            $request->all(), [
            'pin_code' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required'
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('pin_code', $request->pin_code)->where('phone', $request->phone)->first();
        if ($client ) {
            $client->password = bcrypt($request->password);
            $client->pin_code = null;
            if ( $client->save() ) {
                return responseJson(1, 'Password Reset Successfully');
            } else {
                return responseJson(0, 'error, please try again');
            }
        } else {
            return responseJson(0, 'This code is invalid');
        }        
    }

    public function profile( Request $request) {
        $validator = Validator()->make(
            $request->all(), [
            'password' => 'confirmed',
            'email' => Rule::unique('clients', 'email')->ignore($request->user()->id),
            'phone' => Rule::unique('clients', 'phone')->ignore($request->user()->id),
            ]
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $currentUser = $request->user();

        $currentUser->update($request->all());

        if ($request->has('password')) {
            $currentUser->password = bcrypt($request->password);
        }

        $currentUser->save();

        if ($request->has('governorate_id')) {
            $currentUser->governorates()->detach($request->governorate_id);
            $currentUser->governorates()->attach($request->governorate_id);
        }

        if ($request->has('blood_type')) {
            $bloodtype = BloodType::where('name', $request->blood_type)->first();
            $currentUser->blood_types()->detach($bloodtype->id);
            $currentUser->blood_types()->attach($bloodtype->id);
        }
    }
}
