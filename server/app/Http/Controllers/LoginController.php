<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\AssignThisVariablePass;

class LoginController extends Controller
{
    public function showLogin() {
        return view('admin.layout.login');
    }

    public function login(Request $request) {
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (!Auth::attempt($user)) {
            return redirect()->route('login')->with('login-error','Invalid Email or Password');
        } else
        {
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
