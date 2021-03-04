<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfileRequest;


class ProfileController extends Controller
{
    public function index(ProfileRequest $request)
    {

        $currntUser = $request->user();
        $currntUser->update($request->all());
        if ($request->has('password')) {
            $currntUser->password = bcrypt($request->password);
        }
        $currntUser->save();

        if ($request->has('governorate_id')) {
            $currntUser->governorates->detach($request->governorate_id);
            $currntUser->governorates->attach($request->governorate_id);
        }

        if ($request->has('blood_type_id')) {
            $currntUser->blood_types->detach($request->blood_type_id);
            $currntUser->blood_types->attach($request->blood_type_id);
        }
        return responseJson(
            1,
            'data updated successfully',
            [
                'api_token' => $currntUser->api_token,
                'client' => $currntUser,
            ]
        );
    }
}
