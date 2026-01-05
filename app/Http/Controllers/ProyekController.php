<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Proyek::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_proyek', 'like', "%{$search}%")
                    ->orWhere('kode_proyek', 'like', "%{$search}%");
            });
        }

        // Filter Tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter Sumber Dana
        if ($request->filled('sumber_dana')) {
            $query->where('sumber_dana', $request->sumber_dana);
        }

        $proyeks = $query->paginate(3);

        // Get distinct values for filters
        $tahuns      = Proyek::select('tahun')->distinct()->whereNotNull('tahun')->orderBy('tahun', 'desc')->pluck('tahun');
        $sumberDanas = Proyek::select('sumber_dana')->distinct()->whereNotNull('sumber_dana')->orderBy('sumber_dana')->pluck('sumber_dana');

        return view('proyek.index', compact('proyeks', 'tahuns', 'sumberDanas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.show', compact('proyek'));
    }
}
