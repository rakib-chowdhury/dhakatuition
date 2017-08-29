<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMailSendController extends Controller
{
    protected function sendContactMail(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required', 'message' => 'required']);
        
        //Mail::to('tahminaiti@gmail.com')->send(new ContactMail($request->all()));
       Mail::to('marof.ewu@gmail.com')->send(new ContactMail($request->all()));
       
       return redirect('/#contact')->with('success','Mail has been send...'); 
    }
}
