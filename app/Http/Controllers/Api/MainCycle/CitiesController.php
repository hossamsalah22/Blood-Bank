<?php

namespace App\Http\Controllers\Api\MainCycle;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::where(
            function ($query) use ($request) {
                if ($request->has('governorate_id')) {
                    $query->where('governorate_id', $request->governorate_id);
                }
            }
        )->get();
        return responseJson(1, 'Success', $cities);
    }
}
