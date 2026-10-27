<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogistikController extends Controller
{
    public function index()
    {
        return view('logistik.index', ['hasil' => null]);
    }

    public function hitung(Request $request)
    {
        $d = $request->validate([
            'pengungsi' => 'required|integer|min:1|max:100000',
            'hari'      => 'required|integer|min:1|max:365',
        ]);

        // Standar kebutuhan per orang per hari (asumsi prototipe)
        $standar = [
            ['item' => 'Beras',       'satuan' => 'kg',    'per' => 0.4],
            ['item' => 'Air minum',   'satuan' => 'liter', 'per' => 15],
            ['item' => 'Mi instan',   'satuan' => 'bungkus','per' => 2],
            ['item' => 'Selimut',     'satuan' => 'lembar', 'per' => 1, 'sekali' => true],
        ];

        $hasil = [];
        foreach ($standar as $s) {
            $total = $s['per'] * $d['pengungsi'] * (!empty($s['sekali']) ? 1 : $d['hari']);
            $hasil[] = ['item' => $s['item'], 'satuan' => $s['satuan'], 'total' => $total];
        }

        return view('logistik.index', ['hasil' => $hasil, 'input' => $d]);
    }
}
