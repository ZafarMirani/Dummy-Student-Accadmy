<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

// use Illuminate\Contracts\Mail\Mailable;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // $user = Student::find($id); 

        // $email = $user->email;
        // Validate the form data
        $request->validate([
            'email_body' => 'required|string',
        ]);

        // Send the email
        $emailTitle ='Mail From Dummy Student Accadmy';
        $emailBody = $request->input('email_body');

        Mail::to('miranizafar91@gmail.com')->send(new \App\Mail\MyTestMail ($emailTitle, $emailBody));

        // dd('success', 'Email sent successfully!');
        Session::flash('Email','Email Successfully send');
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $receiverNumber = "+923240754300";
        // $message = "This is testing from ItSolutionStuff.com";
        $message = $request->input('message');
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);

                Session::flash('SMS','SMS Successfully send');
                return redirect()->back();
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }

       
    }
}
