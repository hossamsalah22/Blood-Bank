<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\Client;
use Str;

class RegisterController extends Controller
{
    public function index( Request $request) 
    {
        $validator = Validator()->make(
            $request->all(), [
            'name' => 'required|max:25',
            'phone' => 'required|unique:clients',
            'email' => 'required|email|unique:clients',
            'password' => 'required|min:6|confirmed',
            'last_donation' => 'required',
            'd_o_b' => 'required',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        $client->blood_types()->attach($request->blood_type_id);
        $gov = City::where('id', $request->city_id)->first();
        $client->governorates()->attach($gov->governorate_id);
        return responseJson(
            1, 'Register Success', [
            'api_token' => $client->api_token,
            'client' => $client,
            ]
        );
    }
}
