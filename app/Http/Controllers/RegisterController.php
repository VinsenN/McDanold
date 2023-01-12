<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:5",
            "email" => "required|email|unique:users",
            "password" => "required|alpha_num|min:8|required_with:password_confirmation",
            "password_confirmation" => "required|alpha_num|min:8|same:password",
            "gender" => "required",
            "date_of_birth" => "required|before:today",
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->gender = $validated['gender'];
        $user->date_of_birth = $validated['date_of_birth'];
        $user->save();

        return redirect('/login')->with('success', 'Account Registration Success');
    }
}
