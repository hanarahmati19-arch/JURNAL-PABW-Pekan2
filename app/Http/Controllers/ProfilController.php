<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Profil petugas yang sedang login (data dari Auth::user()).
     */
    public function index()
    {
        $petugas = Auth::user();

        return view('profil', compact('petugas'));
    }
}
