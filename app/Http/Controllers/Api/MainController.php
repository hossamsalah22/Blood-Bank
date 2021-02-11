<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function governorates()
    {
        $governorates = Governorate::all();

        return responseJson(1, 'Success', $governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(
            function ($query) use ( $request ){
                if ($request->has( 'governorate_id')) {
                    $query->where('governorate_id' , $request->governorate_id);
                }
            }
        )->get();

        return responseJson(1, 'Success', $cities);
    }

    public function categories()
    {
        $categories = Category::all();

        return responseJson(1, 'Success', $categories);
    }

    public function posts(Request $request)
    {
        $posts = Post::with('category')->paginate(5);

        return responseJson(1, 'Success', $posts);
    }
}
