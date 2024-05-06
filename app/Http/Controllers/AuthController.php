<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min_digits:6|confirmed'
        ]);

        $user = $request->except('_token', 'password_confirmation');
        $user['password'] = Hash::make($user['password']);

        User::create($user);

        return redirect(route('login'));
    }
}
