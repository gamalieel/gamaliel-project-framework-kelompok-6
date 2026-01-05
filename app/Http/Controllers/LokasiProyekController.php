<?php

namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class LokasiProyekController extends Controller
{
    public function index()
    {
        $lokasi = LokasiProyek::with('proyek')->get();
        return view('lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        return view('lokasi.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'geojson' => 'nullable|string'
        ]);

        LokasiProyek::create($request->all());

        return redirect()->route('lokasi.index')->with('success', 'Lokasi proyek berhasil ditambahkan!');
    }

    public function show($id)
    {
        $lokasi = LokasiProyek::findOrFail($id);
        return view('lokasi.show', compact('lokasi'));
    }

    public function edit($id)
    {
        $lokasi = LokasiProyek::findOrFail($id);
        $proyek = Proyek::all();
        return view('lokasi.edit', compact('lokasi', 'proyek'));
    }

    public function update(Request $request, $id)
    {
        $lokasi = LokasiProyek::findOrFail($id);
        
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'geojson' => 'nullable|string'
        ]);

        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')->with('success', 'Lokasi proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $lokasi = LokasiProyek::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi proyek berhasil dihapus!');
    }
}