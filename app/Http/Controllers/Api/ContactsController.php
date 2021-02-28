<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contactUs(Request $request) 
    {
        $rules = [
            'phone' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'subject' => 'required'
        ];
        $validator = Validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first());
        }
        $contact = Contact::create($request->all());
        $contact->save();
        return responseJson(1, 'thanks for your message we will reply as soon as possible',$contact);
    }
}
