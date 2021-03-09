<?php

namespace App\Http\Controllers\Front\Ar;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Http\Requests\Front\CreateDonationRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(Request $request)
    {
        $posts = Post::take(6)->get();
        $donations = DonationRequest::where(
            function ($q) use ($request) {
                if ($request->has('city_id')) {
                    if ($request->has('blood_type_id')) {
                        $q->where('blood_type_id', $request->blood_type_id)
                            ->where('city_id', $request->city_id);
                    } else {
                        $q->where('city_id', $request->city_id);
                    }
                } elseif ($request->has('blood_type_id')) {
                    $q->where('blood_type_id', $request->blood_type_id);
                }
            }
        )->latest()->paginate(5);
        $bloods = BloodType::all();
        $cities = City::all();
        return view(
            'front/ar.home',
            compact('posts', 'donations', 'bloods', 'cities')
        );
    }

    public function contact()
    {
        return view('front/ar.contacts');
    }

    public function contactUs(ContactRequest $request)
    {
        $model = Contact::create($request->all());
        flash('Thanks for your message we will reply soon')->success();
        return back();
    }

    public function about()
    {
        return view('front/ar.about');
    }

    public function donations(Request $request)
    {
        $donations = DonationRequest::where(
            function ($q) use ($request) {
                if ($request->has('city_id')) {
                    if ($request->has('blood_type_id')) {
                        $q->where('blood_type_id', $request->blood_type_id)
                            ->where('city_id', $request->city_id);
                    } else {
                        $q->where('city_id', $request->city_id);
                    }
                } elseif ($request->has('blood_type_id')) {
                    $q->where('blood_type_id', $request->blood_type_id);
                }
            }
        )->latest()->paginate(5);
        return view('front/ar.donation-requests', compact('donations'));
    }

    public function donationDetails($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('front/ar.donation_details', compact('donation'));
    }

    public function toggleFavourite(Request $request)
    {
        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'succes', $toggle);
    }

    public function donationCreate()
    {
        return view('front/ar.create-donation-requests');
    }

    public function donationCreateSave(CreateDonationRequest $request)
    {
        $model = DonationRequest::create($request->all());
        flash('Donation Added Successfully')->success();
        return redirect(url('/donation-requests'));
    }
}
