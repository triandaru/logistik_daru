<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // foreach (range(1, 10) as $index) {
        //     DB::table('barangs')->insert([
        //         'nama_barang' => $faker->word,
        //         'stok' => $faker->numberBetween(10, 100),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Siomay Kuncup Besar',
                'stok' => 78,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Pilus Cikur Sari Rasa',
                'stok' => 99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Basreng Original',
                'stok' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Batagor Kotak',
                'stok' => 88,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
