<?php

namespace App\Utils;

use App\Models\ClassUser;
use App\Models\User;

class ReadExcel
{
    public static function readUsers(array $rows, $level)
    {
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];

            if (HandleRequests::checkEmptyRow($row)) {
                continue;
            }

            $username = $row[0];
            $name = $row[1];
            if ($level == 3) {
                // GET KELAS ID
                $class_name = $row[2];
                $getClass = ClassUser::where(['class_name', $class_name])->first();
            }

            // CHECK IF USER EXISTS
            $getUser = User::where(['username' => $username])->first();

            if ($getUser === null) {
                $user = new User();
                $user->username = $username;
                $user->name = $name;
                $user->password = bcrypt($username);
                if ($level == 3) {
                    $user->level_id = 3;
                    $user->class_id = ($getClass !== null) ? $getClass->class_id : null;
                } elseif ($level == 2) {
                    $user->level_id = 2;
                    $user->class_id = null;
                }
                $user->created_at = now();

                $user->save(); // Simpan data user baru ke database                
            }
        }
    }
}
