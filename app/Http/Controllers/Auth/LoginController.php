<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    # render view login
    protected function showLogin()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    # handle login user
    protected function handleLoginOnWeb(Request $request)
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

        return back()->with('error', 'Username atau Password anda salah!');
    }

    # handle logout user
    protected function handleLogout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }
}
