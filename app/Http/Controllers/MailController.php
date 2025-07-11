<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Support\facades\Mail;
use Illuminate\Http\Request;
class MailController extends Controller
{
    function showemail(){
        return view('mail.send-email');
    }
    function sendEmail(Request $request)
    {
        $request->validate([
            'to'=>"required|email",
            'msg'=>"required|min:5",
            'sub'=>"required|min:3"
        ]);
        $to = $request->to;
        $msg = $request->msg;
        $sub = $request->sub;
        Mail::to($to)->send(new SendMail($msg, $sub));
        return 'Send';
    }
}
