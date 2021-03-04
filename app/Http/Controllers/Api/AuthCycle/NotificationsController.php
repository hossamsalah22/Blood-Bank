<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Models\Token;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    public function settings(Request $request)
    {
        $validator = Validator()->make(
            $request->all(),
            [
                'governorate_id' => 'exists:governorates,id',
                'blood_type_id' => 'exists:blood_types,id'
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }


        if ($request->has('governorate_id')) {
            $request->user()->governorates()->toggle($request->governorate_id);
        }

        if ($request->has('blood_type_id')) {
            $request->user()->blood_types()->toggle($request->blood_type_id);
        }

        return responseJson(1, 'Data Updated Successfully');
    }

    public function registerToken(Request $request)
    {
        $validator = Validator()->make(
            $request->all(),
            [
                'token' => 'required',
                'type' => 'required|in:android,ios',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }

        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'registered successfully');
    }

    public function removeToken(Request $request)
    {
        $validator = Validator()->make(
            $request->all(),
            [
                'token' => 'required',
            ]
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }

        Token::where('token', $request->token)->delete();
        return responseJson(1, 'Deleted Successfully');
    }
}
