<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create(Request $request)
    {
        return view('send-email-form');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'message'=>'required'
        ]);
        $to = $request->email;
        $body = $request->message;
        $check = Mail::raw($body,function($message) use ($to) {
            $message->to($to)
                ->subject('Test email abc');
        });

        return back()->with('success','Email Sent Successfully');
    }
}
