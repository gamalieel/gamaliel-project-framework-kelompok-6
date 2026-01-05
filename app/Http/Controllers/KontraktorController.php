<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\Proyek;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    public function index()
    {
        $kontraktor = Kontraktor::with('proyek')->get();
        return view('kontraktor.index', compact('kontraktor'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        return view('kontraktor.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama' => 'required|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string'
        ]);

        Kontraktor::create($request->all());

        return redirect()->route('kontraktor.index')->with('success', 'Kontraktor berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kontraktor = Kontraktor::findOrFail($id);
        return view('kontraktor.show', compact('kontraktor'));
    }

    public function edit($id)
    {
        $kontraktor = Kontraktor::findOrFail($id);
        $proyek = Proyek::all();
        return view('kontraktor.edit', compact('kontraktor', 'proyek'));
    }

    public function update(Request $request, $id)
    {
        $kontraktor = Kontraktor::findOrFail($id);
        
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama' => 'required|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string'
        ]);

        $kontraktor->update($request->all());

        return redirect()->route('kontraktor.index')->with('success', 'Kontraktor berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kontraktor = Kontraktor::findOrFail($id);
        $kontraktor->delete();
        return redirect()->route('kontraktor.index')->with('success', 'Kontraktor berhasil dihapus!');
    }
}