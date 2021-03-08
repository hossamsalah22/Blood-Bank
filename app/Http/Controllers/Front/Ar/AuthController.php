<?php

namespace App\Http\Controllers\Front\Ar;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;

class AuthController extends Controller
{
    public function register()
    {
        return view('front/ar.register');
    }

    public function registerCreate(RegisterRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        $client->blood_types()->attach($request->blood_type_id);
        flash('Success')->success();
        return redirect(url('/client/login'));
    }

    public function login()
    {
        return view('front/ar.signin');
    }

    public function loginCheck(LoginRequest $request)
    {
        $client = Client::where('phone', $request->input('phone'))->first();
        if ($client) {
            if (Auth::guard('clients')->attempt($request->only('phone', 'password'))) {
                flash()->success('مرحبا '.\auth()->guard('clients')->user()->name);
                return redirect('/');
            } else {
                flash()->error('يوجد خطأ فى بيانات الدخول');
                return back();
        return view('site.login');
            }
        }

        flash()->error('لا يوجد حساب مرتبط بهذا الرقم');

        return back();
        // $client = Client::where('phone', $request->phone)->first();
        // if ($client) {
        //     if (Hash::check($request->password, $client->password)) {
        //         flash()->success('مرحبا ');
        //         return redirect(url('/'));
        //     } else {
        //         flash()->error('يوجد خطأ فى بيانات الدخول');
        //         return back();
        //     }
        // }

        // flash()->error('لا يوجد حساب مرتبط بهذا الرقم');

        // return back();
    }
}
