<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $totalGejala = Gejala::count();
        $totalPenyakit = Penyakit::count();
        $totalPengetahuan = BasisPengetahuan::count();
        $totalAdmin = User::where('role', 'admin')->count();

        return view('user.dashboard', compact('totalGejala', 'totalPenyakit', 'totalPengetahuan', 'totalAdmin'));

    }
    
}

