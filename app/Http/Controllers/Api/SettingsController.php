<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index() 
    {
        return responseJson(1, 'loaded', Setting::all());
    }
}
