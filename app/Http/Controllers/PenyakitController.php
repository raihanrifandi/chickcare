<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Storage;

class PenyakitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); 
    }

    public function index()
    {
        $penyakit = Penyakit::paginate(10);
        return view('admin.penyakit', compact('penyakit'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penyakit' => 'required|string|max:255',
            'detail_penyakit' => 'required|string|max:500',
            'solusi_penyakit' => 'required|string|max:500',
            'gambar_penyakit' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Membuat ID custom berdasarkan urutan terakhir
        $lastPenyakit = Penyakit::latest('kode_penyakit')->first(); // Ambil data penyakit terakhir
        $nextId = $lastPenyakit ? (intval(substr($lastPenyakit->kode_penyakit, 1)) + 1) : 1; // Increment ID terakhir
        $kode_penyakit = 'P' . str_pad($nextId, 3, '0', STR_PAD_LEFT); // Format menjadi P001, P002, dst.

        if ($request->hasFile('gambar_penyakit')) {
            $validated['gambar_penyakit'] = $request->file('gambar_penyakit')->store('uploads', 'public');
        }

        // Menambahkan kode penyakit ke data yang akan disimpan
        Penyakit::create([
            'kode_penyakit' => $kode_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'detail_penyakit' => $request->detail_penyakit,
            'solusi_penyakit' => $request->solusi_penyakit,
            'gambar_penyakit' => $validated['gambar_penyakit'] ?? null,
        ]);

        return redirect()->route('admin.penyakit')->with('success', 'Data penyakit berhasil ditambahkan');
    }

    public function update(Request $request, $kode_penyakit)
    {
        $validated = $request->validate([
            'nama_penyakit' => 'required|string|max:255',
            'detail_penyakit' => 'required|string|max:500',
            'solusi_penyakit' => 'required|string|max:500',
            'gambar_penyakit' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $penyakit = Penyakit::findOrFail($kode_penyakit);

        if ($request->hasFile('gambar_penyakit')) {
            // Hapus file lama jika ada
            if ($penyakit->gambar_penyakit) {
                Storage::disk('public')->delete($penyakit->gambar_penyakit);
            }

            // Simpan file baru
            $validated['gambar_penyakit'] = $request->file('gambar_penyakit')->store('uploads', 'public');
        }

        $penyakit->update($validated);

        return redirect()->route('admin.penyakit')->with('success', 'Data penyakit berhasil diperbarui');
    }
 
    public function destroy($kode_penyakit)
    {
        $penyakit = Penyakit::findOrFail($kode_penyakit);

        if ($penyakit->gambar_penyakit) {
            Storage::delete($penyakit->gambar_penyakit);
        }

        $penyakit->delete();

        return redirect()->route('admin.penyakit')->with('success', 'Data Penyakit berhasil dihapus!');
    }
}
