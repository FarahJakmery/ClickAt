<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function about()
    {

        $about = About::translated()->first();
        $feature = Feature::translated()->first();
        return view('User.pages.about', compact('about', 'feature'));
    }
    public function sent_message_to_email(Request $request)
    {

        $email = 'saramhd999@gmail.com';
        $email_from = 'h@gmail.com';
        $details = [
            'title' => 'test email',
            'name' => $request->user_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'body' => $request->message,

        ];
        Mail::to('saramhd999@gmail.com')->send(new testMail($details));
        Session::flash('message', 'Your message has been sent ');
        return redirect()->back();
    }
}
