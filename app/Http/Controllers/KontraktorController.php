<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\Proyek;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kontraktor::with('proyek');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('penanggung_jawab', 'like', "%{$search}%")
                  ->orWhere('kontak', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhereHas('proyek', function($q) use ($search) {
                      $q->where('nama_proyek', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by year
        if ($request->filled('tahun')) {
            $query->whereHas('proyek', function($q) use ($request) {
                $q->where('tahun', $request->tahun);
            });
        }

        // Filter by contractor
        if ($request->filled('kontraktor')) {
            $query->where('nama', 'like', "%{$request->kontraktor}%");
        }

        $kontraktors = $query->paginate(10);

        // Get unique contractors for filter
        $uniqueKontraktors = Kontraktor::select('nama')
            ->whereNotNull('nama')
            ->where('nama', '!=', '')
            ->distinct()
            ->pluck('nama');

        // Get years for filter
        $years = Proyek::select('tahun')
            ->whereNotNull('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('kontraktor.index', compact('kontraktors', 'uniqueKontraktors', 'years'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kontraktor = Kontraktor::with('proyek')->findOrFail($id);
        
        // Get other projects by the same contractor
        $otherProjects = Kontraktor::with('proyek')
            ->where('nama', $kontraktor->nama)
            ->where('kontraktor_id', '!=', $id)
            ->get();

        return view('kontraktor.show', compact('kontraktor', 'otherProjects'));
    }
}