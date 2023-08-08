<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Utils\PushActivityUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdatePasswordController extends Controller
{
    # change password
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword'       => 'required',
            'newPassword'       => 'required',
            'retypePassword'    => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Semua inputan tidak boleh kosong'
            ], 400);
        }

        if (!Hash::check($request->oldPassword, JWTAuth::user()->password)) {
            return response()->json([
                'success'   => false,
                'message'   => 'Password anda saat ini salah'
            ], 400);
        }

        if ($request->retypePassword == $request->newPassword) {
            DB::table('users')->where('user_id', $request->userId)->update([
                'password'  => Hash::make($request->newPassword)
            ]);

            PushActivityUser::push($request->userId, 'Update Password', 'Telah mengubah password');

            return response()->json([
                'success'   => true,
                'message'   => 'Password anda berhasil diperbarui'
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Konfirmasi password baru anda tidak sama'
            ], 400);
        }
    }
}
