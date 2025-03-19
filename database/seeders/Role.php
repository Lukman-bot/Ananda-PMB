<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['id_role' => '00', 'role' => 'Super Admin', 'keterangan' => null],
            ['id_role' => '10', 'role' => 'Tendik', 'keterangan' => null],
            ['id_role' => '20', 'role' => 'User', 'keterangan' => null],
        ]);
    }
}
