<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\ClassUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    protected function showGuru()
    {
        $data = [
            'title'     => 'Guru',
            'id_page'   => 3,
            'users'     => User::with('level')->where('level_id', 2)->get()
        ];

        return view('core.users', $data);
    }

    protected function showSiswa()
    {
        $data = [
            'title'     => 'Siswa',
            'id_page'   => 4,
            'classes'   => ClassUser::all(),
            'users'     => User::with(['level', 'class'])->where('level_id', 3)->get()
        ];

        return view('core.users', $data);
    }

    protected function createUser(Request $request)
    {
        try {
            DB::table('users')->insert([
                'username'      => $request->username,
                'name'          => $request->name,
                'password'      => bcrypt($request->username),
                'level_id'      => $request->level_id,
                'class_id'      => $request->class_id,
                'created_at'    => now()
            ]);

            return back()->with('success', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            return back()->with('error', 'NIS/NIP sudah digunakan sebelumnya.');
        }
    }
}
