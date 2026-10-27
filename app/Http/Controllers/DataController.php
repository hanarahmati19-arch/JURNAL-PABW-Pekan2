<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Form pelaporan untuk warga (publik, tanpa login).
     */
    public function index()
    {
        return view('laporan.form');
    }
    /**
     * Simpan laporan warga ke database (publik, tanpa login).
     */
    public function proses(Request $request)
    {
        $data = $request->validate([
            'nama'            => ['required', 'string', 'max:100'],
            'lokasi'          => ['required', 'string', 'max:150'],
            'tinggi_genangan' => ['required', 'integer', 'min:0', 'max:1000'],
        ], [
            'nama.required'            => 'Nama pelapor wajib diisi.',
            'lokasi.required'          => 'Lokasi kejadian wajib diisi.',
            'tinggi_genangan.required' => 'Tinggi genangan wajib diisi.',
            'tinggi_genangan.integer'  => 'Tinggi genangan harus berupa angka bulat.',
        ]);

        Laporan::create([
            'nama_pelapor'     => $data['nama'],
            'lokasi'           => $data['lokasi'],
            'tinggi_genangan'  => $data['tinggi_genangan'],
            'tanggal_kejadian' => now()->toDateString(),
        ]);

        return view('laporan.hasil', [
            'nama'            => $data['nama'],
            'lokasi'          => $data['lokasi'],
            'tinggi_genangan' => $data['tinggi_genangan'],
        ]);
    }

    /**
     * Daftar laporan (khusus petugas, dilindungi middleware auth di routes/web.php).
     */
    public function daftar()
    {
        $laporan = Laporan::orderByDesc('tanggal_kejadian')->orderByDesc('id')->get();

        return view('daftar', compact('laporan'));
    }
}
