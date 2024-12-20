<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\BasisPengetahuan;
use App\Models\Riwayat;


class DiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('user.diagnosa', compact('gejala'));
    }

    public function process(Request $request)
    {
       
        $input = $request->input('gejala'); 
        $basisPengetahuan = BasisPengetahuan::with(['penyakit', 'gejala'])->get();

        $hasilDiagnosa = [];
        $gejalaDanKepercayaan = [];

        foreach ($basisPengetahuan->groupBy('kode_penyakit') as $kodePenyakit => $aturan) {
            $cfCombine = 0;

            foreach ($aturan as $rule) {
                $cfUser = isset($input[$rule->kode_gejala]) ? $input[$rule->kode_gejala] : 0;
                $cfRule = $rule->cf;

                $cfGejala = $cfUser * $cfRule;
                $cfCombine = $cfCombine + $cfGejala * (1 - $cfCombine);

                if ($cfUser > 0) {
                    // Periksa apakah kode gejala sudah ada dalam array
                    $existingGejala = array_column($gejalaDanKepercayaan, 'kode_gejala');
                    if (!in_array($rule->kode_gejala, $existingGejala)) {
                        $gejalaDanKepercayaan[] = [
                            'kode_gejala' => $rule->kode_gejala,
                            'nama_gejala' => $rule->gejala->nama_gejala,
                            'cf' => round($cfGejala, 2),
                        ];
                    }
                }
                
            }

            $hasilDiagnosa[] = [
                'nama_penyakit' => $aturan->first()->penyakit->nama_penyakit,
                'detail_penyakit' => $aturan->first()->penyakit->detail_penyakit,
                'solusi_penyakit' => $aturan->first()->penyakit->solusi_penyakit,
                'gambar_penyakit' => $aturan->first()->penyakit->gambar_penyakit,
                'kode_penyakit' => $kodePenyakit,
                'cf' => round($cfCombine, 2),
            ];
        }

        usort($hasilDiagnosa, function ($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        $hasilTertinggi = $hasilDiagnosa[0] ?? null;

        if ($hasilTertinggi) {
            Riwayat::create([
                'user_id' => auth()->id(),
                'tanggal_diagnosa' => now(),
                'penyakit_kode' => $hasilTertinggi['kode_penyakit'],
                'gejala_dan_kepercayaan' => json_encode($gejalaDanKepercayaan),
                'persentase' => $hasilTertinggi['cf'] * 100,
            ]);
        }

        return view('user.results', compact('hasilDiagnosa', 'gejalaDanKepercayaan', 'hasilTertinggi'));
    }

}
