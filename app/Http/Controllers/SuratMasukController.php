<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use function Ramsey\Uuid\v1;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratmasuk = SuratMasuk::all();

        return view('surat-masuk.index', compact('suratmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surat_masuks|max:255',
            'judul' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
            'tanggal_masuk' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'file_path' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('public/surat-masuk');
        } else {
            $validated['file_path'] = null;
        }
        // $validated['file_path'] = $request->file('file_path')->store('public/surat-masuk');
  
        try {
            SuratMasuk::create($validated);
            return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk Berhasilh Ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('surat-masuk.index')->with('error', 'Surat Masuk Gagal Ditambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
        return view('surat-masuk.show', compact('suratMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
            'tanggal_masuk' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'file_path' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('file_path')) {
            if ($suratMasuk->file_path) {
                Storage::delete($suratMasuk->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('public/surat-masuk');
        }

        try {
            $suratMasuk->update($validated);
            return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()->route('surat-masuk.index')->with('error', 'Surat Masuk Gagal Diubah'. $th);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        //
        $suratMasuk->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk Berhasilh Dihapus');
    }

}
