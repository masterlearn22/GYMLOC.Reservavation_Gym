<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan role dengan data lengkap
        DB::table('role')->insert([
            [
                'id_role' => 1,
                'role' => 'user',
                'CREATE_BY' => 'system', // Anda bisa menggantinya sesuai kebutuhan
                'CREATE_DATE' => Carbon::now(),
                'DELETE_MARK' => null,
                'UPDATE_BY' => null,
                'UPDATE_DATE' => null
            ],
            [
                'id_role' => 2,
                'role' => 'admin',
                'CREATE_BY' => 'system',
                'CREATE_DATE' => Carbon::now(),
                'DELETE_MARK' => null,
                'UPDATE_BY' => null,
                'UPDATE_DATE' => null
            ],
            [
                'id_role' =>3,
                'role' => 'gym',
                'CREATE_BY' => 'system',
                'CREATE_DATE' => Carbon::now(),
                'DELETE_MARK' => null,
                'UPDATE_BY' => null,
                'UPDATE_DATE' => null
            ]
        ]);
    }
}


