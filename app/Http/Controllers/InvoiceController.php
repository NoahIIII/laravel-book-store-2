<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    function store(Request $request,$order_id,$total){
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->except('_token');

        $data['order_id']=$order_id;
        $data['total']=$total;
        // dd($data);
        DB::table('invoices')->insert($data);


    }
    function validator($request){
        return Validator::make($request,[
            'fname' =>'required|max:255|min:3',
            'lname' =>'required|max:255|min:3',
            'city' =>'required|max:15|min:2',
            'address' =>'required|max:255',
            'phone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'email' =>'required|email',
            'note' =>'max:255',
        ]);
    }
    function index($order_id){
        $invoice=DB::table('invoices')->where('order_id',$order_id)->get();
        return $invoice;
    }
}
