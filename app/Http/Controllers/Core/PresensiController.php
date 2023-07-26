<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    protected function showPresensi()
    {
        $data = [
            'title'     => 'Data Presensi',
            'id_page'   => 2,
        ];

        return view('core.presensi', $data);
    }
}
