<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function Register(RegisterRequest $request){

        $data = $request->validated();
        $data['username']=$data['fname'].$data['lname'];
        $user = User::create($data);

     $token=$user->createToken('API token')->plainTextToken;
        // Auth::guard('sanctum')->login($user);
        return response()->json(['data'=>new UserResource($user),'token'=>$token],201);

    }
    function login(LoginRequest $request){
        $data = $request->validated();
        $user = User::where('email',$data['email'])->first();
        if(!$user || !Hash::check($data['password'],$user->password)){
            return response()->json(['message'=>'The email or password is incorrect'],401);
        }
        $token=$user->createToken('API token')->plainTextToken;

        return response()->json(['data'=>new UserResource($user),'token'=>$token],200);
    }
function logout(){
$id=Auth::guard('sanctum')->user()->id;
$user = User::where('id',$id)->first();
$user->tokens()->delete();
// $user->currentAccessToken()->delete();
}
function Check(){

        return response()->json(['data'=>Auth::guard('sanctum')->user()]);

}
}
