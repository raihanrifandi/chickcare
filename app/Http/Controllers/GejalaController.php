<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function __construct()
    {
        // Ensure that only authenticated users can access this controller
        $this->middleware('auth');
    }

    /**
     * Display the list of gejala.
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('gejala.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new gejala.
     */
    public function create()
    {
        return view('gejala.create');
    }

    /**
     * Store a newly created gejala.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        // Insert the gejala into the database using the model
        gejala::create([
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect()->route('gejala.index'); // Redirect back to the gejala list page
    }

    /**
     * Show the form for editing an existing gejala.
     */
    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified gejala.
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        // Find the gejala by ID and update it
        $gejala = Gejala::findOrFail($id);
        $gejala->update([
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect()->route('gejala.index'); // Redirect back to the gejala list page
    }

    /**
     * Remove the specified gejala from the database.
     */
    public function destroy($id)
    {
        // Delete the gejala record using the model
        Gejala::destroy($id);

        return redirect()->route('gejala.index'); // Redirect back to the gejala list page
    }
}
