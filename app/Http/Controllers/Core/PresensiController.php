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

    protected function showCategoryPresensi($rekapan)
    {
        $data = [
            'title'     => 'Kategori Data Presensi',
            'id_page'   => null,
            'rekapan'   => $rekapan
        ];

        return view('core.category_presensi', $data);
    }

    protected function showDataPresensi($rekapan, $user)
    {
        $data = [
            'title'     => 'Presensi ' . ucfirst($rekapan) . ' ' . ucfirst($user),
            'id_page'   => null,
            'user'      => $user,
            'rekapan'   => $rekapan,
        ];

        return view('core.data_presensi', $data);
    }
}
