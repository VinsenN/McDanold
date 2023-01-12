<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $validation = $request->validate([
            "email" => "required|email",
            "password" => "required|alpha_num",
        ]);

        $cred = $request->only('email', 'password');
        if (Auth::attempt($cred)) {
            if ($request->rememberMe != null) {
                Cookie::queue('last_email_log', $request->email, 3 * 60);
                Cookie::queue('last_pass_log', $request->password, 3 * 60);
            }
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->withErrors(['invalidCred' => 1]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
