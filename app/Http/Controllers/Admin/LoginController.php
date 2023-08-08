<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
        return view('login');
    }

    public function postlogin(Request $request)
    {
        
        $arr = ['email' => $request ->email,'password' => $request ->password];
      
        if(Auth::attempt($arr)){
            return redirect()->intended('admin/home');
        }
        else
        {
            return back()->withInput()->with('error','Username or Password is incorrect');
        }
    }
}
