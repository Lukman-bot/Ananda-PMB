<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['full_name' => 'Admin', 'alamat_email' => 'admin@gmail.com', 'password' => '$2y$12$rehtbZMGs89O9MWVbQdJtuBt/xunDBXrKE13Y1rKEgld/ud1t.J8m', 'id_role' => '00', 'created_at' => now()],
            ['full_name' => 'Tendik', 'alamat_email' => 'tendik@gmail.com', 'password' => '$2y$12$rehtbZMGs89O9MWVbQdJtuBt/xunDBXrKE13Y1rKEgld/ud1t.J8m', 'id_role' => '10', 'created_at' => now()],
            ['full_name' => 'User', 'alamat_email' => 'user@gmail.com', 'password' => '$2y$12$rehtbZMGs89O9MWVbQdJtuBt/xunDBXrKE13Y1rKEgld/ud1t.J8m', 'id_role' => '20', 'created_at' => now()],
        ]);
    }
}
