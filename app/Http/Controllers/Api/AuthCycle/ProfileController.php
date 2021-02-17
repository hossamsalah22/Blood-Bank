<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index( Request $request)
    {
        $validator = Validator()->make(
            $request->all(), [
                'password' => 'confirmed',
                'email' => Rule::unique('clients', 'email')->ignore($$request->user()->id),
                'phone' => Rule::unique('clients', 'phone')->ignore($$request->user()->id),
            ]
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }

        $currntUser = $request->user();
        $currntUser->update($request->all());
        if ($currntUser->has('password')) {
            $currntUser->password = bcrypt($request->password);
        }
        $currntUser->save();

        if ($request->has('gevernorate_id')) {
            $currntUser->gevernorates->detach($request->governorate_id);
            $currntUser->gevernorates->attach($request->governorate_id);
        }

        if ($request->has('blood_type')) {
            $bloodtype = BloodType::where('name', $request->blood_type)->first();
            $currntUser->blood_types->detach($bloodtype->id);
            $currntUser->blood_types->attach($bloodtype->id);
        }
        return responseJson(
            1, 'data updated successfully', [
            'api_token' => $currntUser->api_token,
            'client' => $currntUser,
            ]
        );
    }
}
