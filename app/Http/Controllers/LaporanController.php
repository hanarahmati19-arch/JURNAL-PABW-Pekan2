<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Data contoh (tanpa database)
    private function dataContoh(): array
    {
        return [
            ['nama' => 'Asep Sunandar',  'lokasi' => 'Kec. Dayeuhkolot, Desa Citeureup', 'tinggi' => 25,  'waktu' => '2026-10-01 06:30'],
            ['nama' => 'Siti Rahmawati', 'lokasi' => 'Kec. Baleendah, Desa Andir',       'tinggi' => 50,  'waktu' => '2026-10-01 08:15'],
            ['nama' => 'Dedi Kurniawan', 'lokasi' => 'Kec. Bojongsoang, Desa Lengkong',  'tinggi' => 95,  'waktu' => '2026-10-02 02:40'],
            ['nama' => 'Nina Marlina',   'lokasi' => 'Kec. Rancaekek, Desa Linggar',     'tinggi' => 70,  'waktu' => '2026-10-02 05:10'],
        ];
    }

    public function form()
    {
        return view('laporan.form');
    }

    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama'   => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi' => 'required|numeric|min:0|max:1000',
        ], [
            'nama.required'   => 'Nama pelapor wajib diisi.',
            'lokasi.required' => 'Lokasi kejadian wajib diisi.',
            'tinggi.required' => 'Tinggi genangan wajib diisi.',
            'tinggi.numeric'  => 'Tinggi genangan harus berupa angka.',
        ]);

        // Data hanya diproses sementara, tidak disimpan
        $data['waktu'] = now()->format('Y-m-d H:i');

        return view('laporan.konfirmasi', ['laporan' => $data]);
    }

    public function daftar()
    {
        return view('laporan.daftar', ['laporan' => $this->dataContoh()]);
    }
}
