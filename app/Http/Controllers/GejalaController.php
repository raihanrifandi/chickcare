<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gejala = Gejala::paginate(10);
        return view('admin.gejala', compact('gejala'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        // Ambil ID terakhir dari database
        $lastGejala = Gejala::orderBy('kode_gejala', 'desc')->first();

        // Tentukan kode_gejala baru
        if ($lastGejala) {
            // Ekstrak angka dari format ID terakhir dan tambahkan 1
            $lastNumber = (int) substr($lastGejala->kode_gejala, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1; // Jika belum ada data, mulai dari 1
        }

        // Format kode_gejala baru
        $newKodeGejala = 'G' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        // Simpan data gejala baru
        Gejala::create([
            'kode_gejala' => $newKodeGejala,
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect()->route('admin.gejala')->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function edit($kode_gejala)
    {
        $gejala = Gejala::findOrFail($kode_gejala);
        return view('', compact('gejala'));
    }

    public function update(Request $request, $kode_gejala)
    {
        $validated = $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($kode_gejala);
        $gejala->nama_gejala = $validated['nama_gejala'];
        $gejala->save();

        return redirect()->route('admin.gejala')->with('success', 'Gejala berhasil diperbarui.');
    }


    public function destroy($kode_gejala)
    {
        Gejala::destroy($kode_gejala);
        return redirect()->route('admin.gejala');
    }
}
