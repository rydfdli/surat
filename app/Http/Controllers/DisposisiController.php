<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $disposisis = Disposisi::with('suratmasuk')->get();
        return view('disposisi.index', compact('disposisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SuratMasuk $suratMasuk)
    {
        //
        if ($suratMasuk->disposisi) {
            return redirect()->route('surat-masuk.index')->with('error', 'Surat sudah ada disposisi');
        }

        return view('disposisi.create', compact('suratMasuk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SuratMasuk $suratMasuk)
    {
    
        $validated = $request->validate([
            'tujuan' => 'required|string|max:255',
            'isi_disposisi' => 'nullable|string',
            'sifat_disposisi' => 'required|string|max:255',
            'batas_waktu' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|string|max:255',
        ]);

        try{
            $suratMasuk->disposisi()->create($request->all());
            $suratMasuk->update(['status_disposisi' => true]);
            return redirect()->route('surat-masuk.index')->with('success', 'Disposisi Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('surat-masuk.index')->with('error', 'Disposisi gagal Ditambahkan'. $th);
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
        return view('disposisi.edit', compact('suratMasuk'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        //
        $validated = $request->validate([
            'tujuan' => 'required|string|max:255',
            'isi_disposisi' => 'nullable|string',
            'sifat_disposisi' => 'required|string|max:255',
            'batas_waktu' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'required|string|max:255',
        ]);

        try {
            $suratMasuk->disposisi()->update($request->all());
            return redirect()->route('surat-masuk.index')->with('success', 'Disposisi Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()->route('surat-masuk.index')->with('error', 'Disposisi gagal Diubah'. $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
