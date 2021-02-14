<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Contracts\Validation\Validator;
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

    public function donation_request(Request $request)
    {
        $donation_request = DonationRequest::where(
            function ($query) use ( $request ){
                if ($request->has( 'city_id')) {
                    $query->where('city_id' , $request->city_id);
                } elseif ($request->has('blood_type_id')) {
                    $query->where('blood_type_id', $request->blood_type_id);
                }
            }
        )->get();

        return responseJson(1, 'Success', $donation_request);
    }


    public function createDonationRequest(Request $request) {
        $data = [
                'name' => 'required',
                'phone' => 'required|digits:11',
                'blood_type_id' => 'required|exists:blood_types,id',
                'hospital_name' => 'required',
                'patient_age' => 'required',
                'city_id' => 'required|exists:cities,id',
                'blood_bags_num' => 'required',
                'hospital_address' => 'required',
        ];
        $validator = Validator()->make(
            $request->all(), $data 
        );

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $createRequest = $request->user()->donation_requests()->create($request->all());

        return responseJson(1, "success", $createRequest->load('city'));
    }

    public function settings() {
        return responseJson(1, 'loaded', Setting::all());
    }

    public function postFavourite(Request $request) {
        $data = [
            'post_id' => 'requierd|exists:posts,id',
        ];
        
        $validator = Validator()->make(
            $request->all(), $data
        );

        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'success', $toggle);
    }

    public function myFavourites(Request $request) {
        $posts = $request->user()->posts()->latest()->paginate(10);
        return responseJson(1, 'success', $posts);
    }
}
