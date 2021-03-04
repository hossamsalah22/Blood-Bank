<?php

namespace App\Http\Controllers\Api\AuthCycle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ResetRequest;
use App\Mail\ResetPassword;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index(ResetRequest $request)
    {
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            $code = rand(1111, 9999);
            $update = $client->update(['pin_code' => $code]);
            if ($update) {
                Mail::to($client->email)
                    ->bcc("hossamsalahabbas@gmail.com")
                    ->send(new ResetPassword($code));
                return responseJson(1, 'reset code sent successfully, please check your email', $code);
            } else {
                return responseJson(0, 'error, please try again');
            }
        } else {
            return responseJson(0, 'no account associated with this number');
        }
    }
}
