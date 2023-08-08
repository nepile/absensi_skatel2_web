<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class PushActivityUser
{

    public static function push($user_id, $action, $desc)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            DB::table('user_activity')->insert([
                'user_id'       => $user_id,
                'action'        => $action,
                'activity_desc' => $desc,
                'created_at'    => now(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success'   => false,
                'message'   => 'Gagal menambahkan log user',
            ], 500);
        }
    }
}
