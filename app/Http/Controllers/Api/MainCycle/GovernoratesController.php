<?php

namespace App\Http\Controllers\Api\MainCycle;

use App\Http\Controllers\Controller;
use App\Models\Governorate;

class GovernoratesController extends Controller
{
    public function index() {
        $governorates = Governorate::all();

        return responseJson(1, 'Success', $governorates);
    }
}
