<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    function index(){

    $contacts =Contact::paginate(10);
    return response()->json(['contacts'=>$contacts]);

    }
    // public function create(){
    //     return view('contact');
    // }
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
           return response()->json($validator);
       }
        Contact::create($data);
        return response()->json(['success'=>'Message Sent']);
    }
    function destroy($contact_id){
        Contact::find($contact_id)->delete();
        return response()->json(['success'=>'Message Deleted']);

    }
    public function GetTodayMessages(){
        $today = date('Y-m-d');
        return response()->json(['Messages_Count'=>Contact::where('created_at','like',$today.'%')->count()]);
    }
}
