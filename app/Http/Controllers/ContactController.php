<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required',
        ]);
       
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        
        if(Mail::to('eng.rizkar@gmail.com')->send(new \App\Mail\contact($data))){
            return response()->json(['success'=>'Thanks for contacting us!']);
        }
        else{
            return response()->json(['error'=>'Something went wrong!']);
        }
  

    }
}
