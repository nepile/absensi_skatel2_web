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

    # handle login user on the web
    protected function handleLoginOnWeb(Request $request)
    {
        $credentials = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!'
        ]);

        // Attempt to authenticate the user with the provided credentials and level_id = 1
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'level_id' => '1'])) {
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
