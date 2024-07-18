<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\b;

class AuthManager extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function registration()
    {
        return view("registration");
    }

    public function loginpost(Request $request)
    {
        $incomingFields = $request->validate([
            "email"=>["required"],
            "password"=>["required"],
        ]);
    
        $incomingFields = $request->only("email","password");
        if(Auth::attempt($incomingFields)){
            return redirect()->intended(route("home"));
        }
        return redirect()->back()->withErrors(["email"=> "Details not valid"]);


    }
    public function registrationpost(Request $request)
    {
        $incomingFields = $request->validate([
            "name"=>["required"],
            "email"=>["required"],
            "password"=>["required"],
        ]);
        $incomingFields["password"]= bcrypt($incomingFields["password"]);
        $user = User::create($incomingFields);
        if(! $user){
            return redirect()->intended(route('register.post'))->with('error','registration failed');
        }
        return redirect()->intended(route('user.login'))->with('success','registration successful');

        
    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();
    }
}

