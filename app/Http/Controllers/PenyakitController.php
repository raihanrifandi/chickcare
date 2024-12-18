<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    public function __construct()
    {
        // Ensure that only authenticated users can access this controller
        $this->middleware('auth');
    }

    /**
     * Display the list of penyakit.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('penyakit.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new penyakit.
     */
    public function create()
    {
        return view('penyakit.create');
    }

    /**
     * Store a newly created penyakit.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'nama_penyakit' => 'required|string|max:255',
            'detail_penyakit' => 'required|string|max:500',
            'solusi_penyakit' => 'required|string|max:500',
            'gambar_penyakit' => 'required|string|max:255',
        ]);

        // Insert the penyakit into the database using the model
        Penyakit::create([
            'nama_penyakit' => $request->nama_penyakit,
            'detail_penyakit' => $request->detail_penyakit,
            'solusi_penyakit' => $request->solusi_penyakit,
            'gambar_penyakit' => $request->gambar_penyakit,
        ]);

        return redirect()->route('penyakit.index'); // Redirect back to the penyakit list page
    }

    /**
     * Show the form for editing an existing penyakit.
     */
    public function edit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        return view('penyakit.edit', compact('penyakit'));
    }

    /**
     * Update the specified penyakit.
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'nama_penyakit' => 'required|string|max:255',
            'detail_penyakit' => 'required|string|max:500',
            'solusi_penyakit' => 'required|string|max:500',
            'gambar_penyakit' => 'required|string|max:255',
        ]);

        // Find the penyakit by ID and update it
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->update([
            'nama_penyakit' => $request->nama_penyakit,
            'detail_penyakit' => $request->detail_penyakit,
            'solusi_penyakit' => $request->solusi_penyakit,
            'gambar_penyakit' => $request->gambar_penyakit,
        ]);

        return redirect()->route('penyakit.index'); // Redirect back to the penyakit list page
    }

    /**
     * Remove the specified penyakit from the database.
     */
    public function destroy($id)
    {
        // Delete the penyakit record using the model
        Penyakit::destroy($id);

        return redirect()->route('penyakit.index'); // Redirect back to the penyakit list page
    }
}
