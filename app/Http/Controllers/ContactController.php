<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    function index(){

    $contacts =Contact::paginate(10);
    return view('dashboard.contacts.index',['contacts'=>$contacts]);

    }
    public function create(){
        return view('contact');
    }
    function validator($data){
        return Validator::make($data,[
            'name'=>'required|max:20|min:3',
            'email'=>'required|email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
          'subject'=>'required',
          'message'=>'required|max:255',
        ]);
    }
    function store(Request $request){
        $data=$request->except('_token');
       $validator= $this->validator($data);
       $validator->validate();
       if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }
        Contact::create($data);
        return redirect()->back()->with('success','Message Sent');
    }
    function destroy($contact_id){
        Contact::find($contact_id)->delete();
        return redirect()->back()->with('success','Message Deleted');

    }
    public function GetTodayMessages(){
        $today = date('Y-m-d');
        return Contact::where('created_at','like',$today.'%')->count();
    }
}
