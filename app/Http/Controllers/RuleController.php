<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = BasisPengetahuan::with(['penyakit', 'gejala'])->get();
        return view('aturan.index', compact('rules'));
    }

    public function create()
    {
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('aturan.create', compact('penyakit', 'gejala'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_penyakit' => 'required|string|exists:penyakit,kode_penyakit',
            'kode_gejala' => 'required|string|exists:gejala,kode_gejala',
            'mb' => 'required|numeric|min:0|max:1',
            'md' => 'required|numeric|min:0|max:1',
        ]);

        $lastId = BasisPengetahuan::max('id');
        $newId = 'R' . ((int) substr($lastId, 1) + 1);

        $cf = $validated['mb'] - $validated['md'];

        BasisPengetahuan::create([
            'id' => $newId,
            'kode_penyakit' => $validated['kode_penyakit'],
            'kode_gejala' => $validated['kode_gejala'],
            'cf' => $cf,
        ]);

        return redirect()->route('aturan.index')->with('success', 'Aturan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rule = BasisPengetahuan::findOrFail($id);
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();

        return view('aturan.edit', compact('rule', 'penyakit', 'gejala'));
    }

    public function update(Request $request, $id)
    {
        $rule = BasisPengetahuan::findOrFail($id);

        $validated = $request->validate([
            'kode_penyakit' => 'required|string|exists:penyakit,kode_penyakit',
            'kode_gejala' => 'required|string|exists:gejala,kode_gejala',
            'mb' => 'required|numeric|min:0|max:1',
            'md' => 'required|numeric|min:0|max:1',
        ]);

        $cf = $validated['mb'] - $validated['md'];

        $rule->update([
            'kode_penyakit' => $validated['kode_penyakit'],
            'kode_gejala' => $validated['kode_gejala'],
            'cf' => $cf,
        ]);

        return redirect()->route('aturan.index')->with('success', 'Rule berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rule = BasisPengetahuan::findOrFail($id);

        try {
            $rule->delete();
            return redirect()->route('aturan.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('aturan.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

}
