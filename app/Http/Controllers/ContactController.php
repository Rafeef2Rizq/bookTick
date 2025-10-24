<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['email', 'required'],
            'phone' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'comment' => ['required', 'string'],
        ]);
      Mail::to('rfyfrzq7@gmail.com')->send(new ContactEmail(
            $request->name,
            $request->email,
            $request->phone,
            $request->subject,
            $request->comment
        ));

   return redirect()->back()->with('success', 'Your message has been sent successfully!');

    }
}
