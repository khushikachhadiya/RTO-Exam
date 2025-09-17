<?php

namespace App\Http\Controllers;
use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactMailController extends Controller
{
    public function sendcontact(Request $request){
        $details =[
            'name' => $request->name,
            'email'=> $request->email,
            'mobile_no' => $request->mobile_no,
            'city' => $request->city,
            'message' => $request->message,
        ];

        Mail::to('rtoexam@mailtrap.io')->send(new contactMail($details));

        return back()->with('success', __('setting.message_sent'));
     
    }
}
