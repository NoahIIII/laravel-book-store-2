<?php

namespace App\Http\Controllers;

use Vonage\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SMSController extends Controller
{
    //

        public function sendVerification($phone = null , Request $request = null)
        {
            $basic  = new \Vonage\Client\Credentials\Basic("b8135e0e", "Yf78DUsJMOEczROe");
            $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));
            if($phone ==null){
                $phone = $request->phone;
            }
            $verification = $client->verify()->start([
                'number' => $phone,
                'brand' => 'bookstoreproject', // Replace with your application name
                'pin_expiry' => 300,
                'code_length' => 6, // Set the length of the verification code (optional)

            ]);

            // Handle verification initiation response
            if ($verification->getStatus() == '0') {
                // Verification initiated successfully
                $requestId = $verification->getRequestId();
        session()->put('verification_sent', true);
        session()->put('requestid',$requestId);
                return view('auth.reset_password',['requestId' => $requestId]);
            } else {
                // Handle verification initiation failure
                return redirect()->back()->with('error', 'Failed to send verification code , please try again');
            }
        }

        public function verify(Request $request)
        {
            $basic  = new \Vonage\Client\Credentials\Basic("b8135e0e", "Yf78DUsJMOEczROe");
            $client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));
            $code= $request->code;
            $requestID=session('requestid');
// echo $code .''.$requestID;
// die;
            $verification = $client->verify()->check(
                $requestID,
                $code
            );
            // Handle verification check response
            if ($verification->getStatus() == '0') {
                // Verification successful
                session()->forget('requestid');
                User::where('id',Auth::user()->id)->update(['phone_verified_at'=>now()]);

                return redirect()->to(route('home'))->with('success',"Phone number verified successfully!");
            } else {
                // Verification failed
                return redirect()->back()->with('errors','uncorrect code');
            }
        }

    }

