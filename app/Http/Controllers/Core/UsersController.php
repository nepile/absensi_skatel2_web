<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected function showGuru()
    {
        $data = [
            'title'     => 'Guru',
            'id_page'   => 3,
        ];

        return view('core.users', $data);
    }

    protected function showSiswa()
    {
        $data = [
            'title'     => 'Siswa',
            'id_page'   => 4,
        ];

        return view('core.users', $data);
    }
}
