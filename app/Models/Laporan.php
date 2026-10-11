<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /**
     * Nama tabel (default Laravel akan menebak "laporans", jadi ditulis eksplisit).
     */
    protected $table = 'laporan';

    /**
     * Kolom yang boleh diisi lewat Laporan::create().
     */
    protected $fillable = [
        'nama_pelapor',
        'lokasi',
        'tinggi_genangan',
        'tanggal_kejadian',
    ];

    protected function casts(): array
    {
        return [
            'tinggi_genangan' => 'integer',
            'tanggal_kejadian' => 'date',
        ];
    }
}
