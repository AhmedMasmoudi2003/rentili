<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function Sign_In(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($request->only(['email','password']))) {
            return redirect()->intended(route("clients.index"))->with('success', 'Sign In successfully.');
        }else{
            return redirect()->intended(route("Login"))->with('error',"you are not a user or you inserted wrong password");
        }
    }
    public function Sign_out(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

