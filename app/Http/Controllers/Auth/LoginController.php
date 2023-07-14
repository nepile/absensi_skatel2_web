<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function showLogin()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    protected function handleLogin(Request $request)
    {
        $credentials = $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required'
        ], [
            'username'  => 'Username tidak boleh kosong!',
            'password'  => 'Password tidak boleh kosong!'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('overview');
        }

        return back()->with('error', 'username atau password anda salah!');
    }
}
