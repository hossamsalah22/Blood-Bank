<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Client;
use Str;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        $client->blood_types()->attach($request->blood_type_id);
        $gov = City::where('id', $request->city_id)->first();
        $client->governorates()->attach($gov->governorate_id);
        return responseJson(
            1,
            'Register Success',
            [
                'api_token' => $client->api_token,
                'client' => $client,
            ]
        );
    }
}
