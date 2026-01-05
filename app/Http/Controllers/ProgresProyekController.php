<?php

namespace App\Http\Controllers;

use App\Models\ProgressProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Http\Request;

class ProgresProyekController extends Controller
{
    public function index()
    {
        $progress = ProgressProyek::with(['proyek', 'tahapan'])
            ->orderByDesc('tanggal')
            ->paginate(10);

        return view('progres_proyek.index', compact('progress'));
    }

    public function create()
    {
        $proyeks  = Proyek::orderBy('nama_proyek')->get();
        $tahapan  = TahapanProyek::orderBy('nama_tahap')->get();
        $progres  = new ProgressProyek();

        return view('progres_proyek.create', compact('proyeks', 'tahapan', 'progres'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        ProgressProyek::create($data);

        return redirect()->route('progres_proyek.index')->with('success', 'Progress proyek berhasil ditambahkan');
    }

    public function show(ProgressProyek $progres_proyek)
    {
        $progres_proyek->load(['proyek', 'tahapan']);
        return view('progres_proyek.show', compact('progres_proyek'));
    }

    public function edit(ProgressProyek $progres_proyek)
    {
        $proyeks = Proyek::orderBy('nama_proyek')->get();
        $tahapan = TahapanProyek::orderBy('nama_tahap')->get();

        return view('progres_proyek.edit', [
            'progres' => $progres_proyek,
            'proyeks' => $proyeks,
            'tahapan' => $tahapan,
        ]);
    }

    public function update(Request $request, ProgressProyek $progres_proyek)
    {
        $data = $this->validateData($request);
        $progres_proyek->update($data);

        return redirect()->route('progres_proyek.index')->with('success', 'Progress proyek berhasil diupdate');
    }

    public function destroy(ProgressProyek $progres_proyek)
    {
        $progres_proyek->delete();
        return redirect()->route('progres_proyek.index')->with('success', 'Progress proyek berhasil dihapus');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'proyek_id'   => ['required', 'exists:proyek,proyek_id'],
            'tahap_id'    => ['required', 'exists:tahapan_proyek,tahap_id'],
            'persen_real' => ['required', 'numeric', 'between:0,100'],
            'tanggal'     => ['required', 'date'],
            'catatan'     => ['nullable', 'string'],
        ]);
    }
}

