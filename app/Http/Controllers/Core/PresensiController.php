<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    protected function presensi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date('d', strtotime('now'));
        $this_month = date('M', strtotime('now'));
        $this_year = date('Y', strtotime('now'));
        $this_time = date('H:i:s', strtotime('now'));

        $validator = Validator::make($request->all(), [
            'user_id'   => 'required',
            'category'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'User ID & Category Presensi is required!'
            ], 400);
        }

        // CHECK if user has presensi today with the specified category
        $user_check = Presensi::where('user_id', $request->user_id)
            ->where('day', $today)
            ->where('month', $this_month)
            ->where('year', $this_year)
            ->where('category', $request->category)
            ->first();

        try {
            if ($user_check === null) {
                DB::table('presensi')->insert([
                    'user_id'   => $request->user_id,
                    'day'       => $today,
                    'month'     => $this_month,
                    'year'      => $this_year,
                    'time'      => $this_time,
                    'category'  => $request->category
                ]);

                return response()->json([
                    'success'   => true,
                    'message'   => 'Berhasil melakukan presensi' . $request->category
                ], 201);
            } else {
                return response()->json([
                    'success'       => false,
                    'message'       => 'Anda sudah melakukan presensi ' . $request->category . ' hari ini'
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal melakukan presensi',
            ], 500);
        }
    }
}
