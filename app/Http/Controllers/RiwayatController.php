<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::where('user_id', auth()->id())
            ->join('penyakit', 'hasil.penyakit_kode', '=', 'penyakit.kode_penyakit')
            ->orderBy('tanggal_diagnosa', 'desc')
            ->get(['hasil.*', 'penyakit.nama_penyakit']);
        
        return view('user.riwayat', compact('riwayat'));
    }

    public function detail($id_hasil)
    {
        $hasil = Riwayat::with(['penyakit'])->findOrFail($id_hasil);
        $gejalaDanKepercayaan = json_decode($hasil->gejala_dan_kepercayaan, true);

        return view('user.detail', compact('hasil', 'gejalaDanKepercayaan'));
    }

}
