<?php

namespace App\Http\Controllers;

use App\Models\password_reset_token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Password;


use Illuminate\Validation\Rules\Unique;
use Laravel\Fortify\Contracts\PasswordResetProvider;
class UserController extends Controller
{
   function profile()
    {
        return view('auth.profile');
    }
    function ProfileDetails()
    {
        return view('auth.account_details');
    }
    function index(){
        $users=User::paginate(10);
        return view('dashboard.users.index',['users'=>$users]);
    }
    function update($id){
        $user=User::find($id);
        return view('dashboard.users.update',['user'=>$user]);
    }
    function edit_validator($request){

        return Validator::make($request,[
            'fname'=>'required|max:40|min:3',
            'lname'=>'required|max:40|min:3',
            'username'=>'required|max:40|min:3',
            'email'=>['required',
            'email',
            Rule::unique('users','email')->ignore($request['id'],'id')
        ],
        ]);
    }

    function edit(Request $request){
        // $user->save();
        $data=$request->except('_token','_method');
        $data['id']=Auth::user()->id;
       $validator= $this->edit_validator($data);
       $validator->validate();
       if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }
        User::find($request['id'])->update($data);
        return redirect()->back()->with('success','the data changed');
    }
    function GetToDayUsers(){
        $today = date('Y-m-d');

        $users=User::where('created_at','like',$today.'%')->count();
        return $users;
    }
    function validator($data){
        return Validator::make($data,['fname'=>'required|max:40|min:3',
        'lname'=>'required|max:40|min:3',
        'password'=>'required|max:16|min:8',
        'email'=>'email|required',
        'type'=>'required']);
    }

    function Create(Request $request){
        $data=$request->except('_token');
        $validator=$this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data['username']=$data['fname'].$data['lname'];
        User::create($data);
        return redirect()->back()->with('success','User Created');
    }
   function destroy($user_id){
    User::find($user_id)->delete();
    return redirect()->back()->with('success','User Removed');

    }
    function UpdateUserData(Request $request,$user_id){
        $data=$request->except('_token','_method');
        $data['id']=$user_id;
        $validator= $this->edit_validator($data);
       $validator->validate();
       if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $data=$request->except('_token','_method');
        User::find($user_id)->update($data);
        return redirect()->back()->with('success','the data changed');
    }


}
