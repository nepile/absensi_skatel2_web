<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utils\PushActivityUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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

    # handle login user on the mobile
    protected function handleLoginOnMobile(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Username & Password wajib diisi'
            ], 400);
        }

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Akun anda tidak ditemukan'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'Internal Server Error'
            ], 500);
        }

        if (JWTAuth::user()->level_id != 1) {


            if (JWTAuth::user()->level->level_name == 'siswa') {
                $class_name = JWTAuth::user()->class->class_name;
            } else {
                $class_name = 'Guru';
            }

            if ($request->asParent != false) {
                PushActivityUser::push(JWTAuth::user()->user_id, 'Login', 'Orang tua siswa masuk ke dalam Aplikasi Mobile');
                return response()->json([
                    'success'       => true,
                    'message'       => 'Authorized',
                    'data'          => [
                        'user_id'   => JWTAuth::user()->user_id,
                        'username'  => JWTAuth::user()->username,
                        'name'      => JWTAuth::user()->name,
                        'class'     => $class_name,
                        'role'      => 'Parent'
                    ],
                    'access_token'  => 'Bearer',
                    'token'         => $token
                ], 200);
            }

            PushActivityUser::push(JWTAuth::user()->user_id, 'Login', 'Berhasil masuk ke dalam Aplikasi Mobile');
            return response()->json([
                'success'       => true,
                'message'       => 'Authorized',
                'data'          => [
                    'user_id'   => JWTAuth::user()->user_id,
                    'username'  => JWTAuth::user()->username,
                    'name'      => JWTAuth::user()->name,
                    'class'     => $class_name,
                    'role'      => 'User',
                ],
                'access_token'  => 'Bearer',
                'token'         => $token
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => "Anda superadmin dan tidak diizinkan mengakses aplikasi mobile"
            ], 403);
        }
    }


    # handle logout user
    protected function handleLogout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }
}
