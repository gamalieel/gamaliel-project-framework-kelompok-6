<?php
namespace App\Http\Controllers;

use App\Models\LokasiProyek;

class LokasiProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = LokasiProyek::with('proyek')->get();
        return view('lokasi.index', compact('lokasi'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lokasi = LokasiProyek::with('proyek')->findOrFail($id);
        return view('lokasi.show', compact('lokasi'));
    }
}
