<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function form()
    {
        return view('laporan.form');
    }

    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi_genangan' => 'required|integer|min:0|max:1000',
        ], [
            'nama.required' => 'Nama pelapor wajib diisi.',
            'lokasi.required' => 'Lokasi kejadian wajib diisi.',
            'tinggi_genangan.required' => 'Tinggi genangan wajib diisi.',
            'tinggi_genangan.integer' => 'Tinggi genangan harus berupa angka bulat.',
        ]);

        $laporan = Laporan::create([
            'nama_pelapor' => $data['nama'],
            'lokasi' => $data['lokasi'],
            'tinggi_genangan' => $data['tinggi_genangan'],
            'tanggal_kejadian' => now()->toDateString(),
        ]);

        return view('laporan.hasil', [
            'nama' => $laporan->nama_pelapor,
            'lokasi' => $laporan->lokasi,
            'tinggi_genangan' => $laporan->tinggi_genangan,
        ]);
    }

    public function daftar()
    {
        return view('daftar', ['laporan' => Laporan::latest()->get()]);
    }
}
