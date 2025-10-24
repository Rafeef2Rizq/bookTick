<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{


    public function sendEmail(Request $request)
    {
        try {
            $validated = $request->validate([
                 'name' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'messageBody' => 'required|string',
            ]);

            Mail::to($request->email)->send(new ContactMail($validated['subject'], $validated['messageBody'], $validated['name']));
        } catch (\Throwable $e) {
            Log::error("unable to send email" . $e->getMessage());
        }

        return redirect()->back()->with('message', 'Message sent successfully!');
    }
}
