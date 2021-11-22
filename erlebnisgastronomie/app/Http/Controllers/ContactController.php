<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contactus');
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' =>$request->email,
            'phone' => $request->phone,
            'msg' => $request->msg
        ];

        Mail::to('testdiplomprojekt@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Danke! Ihre Nachricht wurde erfolgreich übermittelt.');
    }
}