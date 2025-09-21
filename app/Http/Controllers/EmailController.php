<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
   public function sendEmail(Request $request){
  $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // إرسال البريد باستخدام Mailable Class
        Mail::to(Auth::user()->email)->send(new ContactEmail($validated['subject'], $validated['message']));

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('message', 'Message sent successfully!');   }
}
