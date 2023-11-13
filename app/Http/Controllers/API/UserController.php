<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function GetToDayUsers(){
        $today = date('Y-m-d');

        $users=User::where('created_at','like',$today.'%')->count();
        return $users;
    }
}
