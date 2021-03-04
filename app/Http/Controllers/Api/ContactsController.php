<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactUsRequest;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function contactUs(ContactUsRequest $request) 
    {
        $contact = Contact::create($request->all());
        $contact->save();
        return responseJson(1, 'thanks for your message we will reply as soon as possible',$contact);
    }
}
