<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = DB::table('roles')->where('nama_role', 'admin')->value('id_role');
        $userRole = DB::table('roles')->where('nama_role', 'user')->value('id_role');

        // Masukkan data pengguna
        DB::table('users')->insert([
            [
                'nama' => 'Triandaru Anugrah',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => $adminRole,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'User Unknown',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => $userRole,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
