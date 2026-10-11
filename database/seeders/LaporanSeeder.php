<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Jumlah data dummy yang dibuat (minimal 15).
     */
    private const JUMLAH = 20;

    /**
     * Daftar kecamatan di Kabupaten Bandung.
     */
    private const KECAMATAN = [
        'Dayeuhkolot',
        'Baleendah',
        'Bojongsoang',
        'Rancaekek',
        'Majalaya',
        'Banjaran',
        'Pameungpeuk',
        'Katapang',
        'Ciparay',
        'Cileunyi',
    ];

    /**
     * Rentang tinggi genangan (cm) per status: Waspada (<30), Siaga (30-70), Awas (>70).
     * Seluruhnya tetap di dalam 10-150 cm; dipakai bergantian supaya ketiga status
     * pasti muncul di halaman daftar laporan.
     */
    private const RENTANG_TINGGI = [
        [10, 29],
        [30, 70],
        [71, 150],
    ];

    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');

        for ($i = 0; $i < self::JUMLAH; $i++) {
            [$min, $max] = self::RENTANG_TINGGI[$i % count(self::RENTANG_TINGGI)];

            Laporan::create([
                'nama_pelapor' => $faker->name(),
                'lokasi' => 'Kec. ' . $faker->randomElement(self::KECAMATAN),
                'tinggi_genangan' => $faker->numberBetween($min, $max),
                'tanggal_kejadian' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
