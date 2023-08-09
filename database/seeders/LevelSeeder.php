<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('level_user')->insert([
            ['level_name' => 'superadmin'],
            ['level_name' => 'guru'],
            ['level_name' => 'siswa']
        ]);
    }
}
