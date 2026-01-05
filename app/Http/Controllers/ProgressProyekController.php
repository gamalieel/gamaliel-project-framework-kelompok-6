<?php

namespace App\Http\Controllers;

use App\Models\ProgressProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;

class ProgressProyekController extends Controller
{
    public function index()
    {
        $progress = ProgressProyek::with(['proyek', 'tahapan'])->get();
        return view('progress.index', compact('progress'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        $tahapan = TahapanProyek::all();
        return view('progress.create', compact('proyek', 'tahapan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string'
        ]);

        ProgressProyek::create($request->all());

        return redirect()->route('progress.index')->with('success', 'Progress proyek berhasil ditambahkan!');
    }

    public function show($id)
    {
        $progress = ProgressProyek::findOrFail($id);
        return view('progress.show', compact('progress'));
    }

    public function edit($id)
    {
        $progress = ProgressProyek::findOrFail($id);
        $proyek = Proyek::all();
        $tahapan = TahapanProyek::all();
        return view('progress.edit', compact('progress', 'proyek', 'tahapan'));
    }

    public function update(Request $request, $id)
    {
        $progress = ProgressProyek::findOrFail($id);
        
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'tahap_id' => 'required|exists:tahapan_proyek,tahap_id',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string'
        ]);

        $progress->update($request->all());

        return redirect()->route('progress.index')->with('success', 'Progress proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $progress = ProgressProyek::findOrFail($id);
        $progress->delete();
        return redirect()->route('progress.index')->with('success', 'Progress proyek berhasil dihapus!');
    }
}