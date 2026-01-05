<?php
namespace App\Http\Controllers;

use App\Models\ProgressProyek;

class ProgresProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = ProgressProyek::with(['proyek', 'tahapan'])
            ->orderByDesc('tanggal')
            ->paginate(10);

        return view('progres_proyek.index', compact('progress'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgressProyek $progres_proyek)
    {
        $progres_proyek->load(['proyek', 'tahapan']);
        return view('progres_proyek.show', compact('progres_proyek'));
    }
}
