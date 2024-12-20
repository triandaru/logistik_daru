<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cities = [
            'Jakarta',
            'Surabaya',
            'Bandung',
            'Medan',
            'Makassar',
            'Semarang',
            'Palembang',
            'Tangerang',
            'Bekasi',
            'Depok',
            'Yogyakarta',
            'Malang',
            'Banjarmasin',
            'Batam',
            'Pekanbaru'
        ];
        // foreach (range(1, 20) as $index) {
        //     DB::table('barang_masuks')->insert([
        //         'kode_barang' => $faker->numberBetween(1, 10),
        //         'qty' => $faker->numberBetween(1, 50),
        //         'origin' => $faker->city,
        //         'tgl_masuk' => $faker->date,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }


        for ($i = 0; $i < 20; $i++) {
            $kode_barang = $faker->numberBetween(1, 4);

            DB::table('barang_masuks')->insert([
                'kode_barang' => $kode_barang,
                'qty' => $faker->numberBetween(1, 50),
                'origin' => $faker->randomElement($cities),
                'tgl_masuk' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // Tanggal dalam 1 tahun terakhir,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}