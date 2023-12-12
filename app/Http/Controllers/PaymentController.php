<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PaymobPayment;

class PaymentController extends Controller
{

    public function payWithPaymob(Request $request){
        $payment = new PaymobPayment();
        $first_name=$request->fname;
        $last_name=$request->lname;
        $email=$request->email;
        $phone=$request->phone;
        $order = new OrderController();
        $order_data=$order->GetOrderData();
        $amount=$order_data['total_after_discount'];
        $response = $payment
        ->setUserFirstName($first_name)
        ->setUserLastName($last_name)
        ->setUserEmail($email)
        ->setUserPhone($phone)
        ->setAmount($amount)->pay();
        return redirect()->to($response['redirect_url']);

    }

    public function verifyWithPaymob(Request $request){
        $payment = new PaymobPayment();
        $response = $payment->verify($request);
        return $response;
    }

}
