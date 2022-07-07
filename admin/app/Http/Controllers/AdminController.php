<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    function LogIn()
    {
        return view('Login');
    }

    function onLogIn(Request $request){
        $username=$request->username;
        $password=$request->password;

        $admin=AdminModel::where('username',$username)->where('password',$password)->count();
        if($admin>0){
            $request->session()->put('user',$username);
            return json_encode(['success'=>'True']);
        }
        return json_encode(['success'=>'False']);

    }

    function onLogOut(Request $request){
        $request->session()->flush();
        return redirect('/LogIn');
    }
}
