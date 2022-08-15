<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;
use App\Models\User;

class UserController extends Controller
{
    //
    function login(request $request){

        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return "Username or password does not match";
        }
        else
        {
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }
}
