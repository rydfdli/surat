<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratKeluar = SuratKeluar::all();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('surat-keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surat_keluars|max:255',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal_keluar' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'file_path' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $validated['file_path'] = $request->file('file_path')->store('public/surat-keluar');

        try {
            SuratKeluar::create($validated);
            return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar Bereah Ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('surat-keluar.index')->with('error', 'Surat Keluar Gagal Ditambahkan'. $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
        return view('surat-keluar.show', compact('suratKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        //
        $validated = $request->validate([
            'nomor_surat' => 'required|max:255',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal_keluar' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'file_path' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->file('file_path')) {
           if ($suratKeluar->file_path) {
               Storage::delete($suratKeluar->file_path);
           }
           $validated['file_path'] = $request->file('file_path')->store('public/surat-keluar');
        }


        try {
            $suratKeluar->update($validated);
            return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar Bereah Diubah');
        } catch (\Throwable $th) {
            return redirect()->route('surat-keluar.index')->with('error', 'Surat Keluar Gagal Diubah'. $th);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        //
        $suratKeluar->delete();
        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar Berhasil Dihapus');
    }
}
