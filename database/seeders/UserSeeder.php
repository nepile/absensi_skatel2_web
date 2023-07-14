<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'      => 206765,
                'password'      => bcrypt('123neville456'),
                'level_id'      => 1,
                'class_id'      => 1,
                'created_at'    => now(),
            ]
        ]);
    }
}
