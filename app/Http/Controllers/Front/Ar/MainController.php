<?php

namespace App\Http\Controllers\Front\Ar;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Post;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::take(6)->get();
        $donations = DonationRequest::take(4)->get();
        $bloods = BloodType::all();
        $cities = City::all();
        return view(
            'front/ar.home',
            compact('posts', 'donations', 'bloods', 'cities')
        );
    }


}
