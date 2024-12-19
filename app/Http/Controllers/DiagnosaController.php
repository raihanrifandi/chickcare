<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Kondisi;

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        $kondisi = Kondisi::all();
        return view('user.diagnosa', compact('gejala', 'kondisi'));
    }

    public function process()
    {
        
    }

}
