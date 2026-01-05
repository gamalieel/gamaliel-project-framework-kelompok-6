<?php
namespace App\Http\Controllers;

use App\Models\TahapanProyek;

class TahapanProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahapans = TahapanProyek::with('proyek')->paginate(10);
        return view('tahapan_proyek.index', compact('tahapans'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tahapan = TahapanProyek::with('proyek')->findOrFail($id);
        return view('tahapan_proyek.show', compact('tahapan'));
    }
}
