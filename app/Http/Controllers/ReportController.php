<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('reports.index');
    }

    public function suratMasuk(){
        $suratMasuk = SuratMasuk::all();
        $totalSuratMasuk = $suratMasuk->count();
        $suratMasukPerMounth = $suratMasuk->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->tanggal_masuk)->format('F');
        });

        return view('reports.surat-masuk', compact('suratMasuk', 'totalSuratMasuk', 'suratMasukPerMounth'));
    }

    public function suratKeluar(){
        $suratKeluar = SuratKeluar::all();
        $totalSuratKeluar = $suratKeluar->count();
        $suratKeluarPerMounth = $suratKeluar->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->tanggal_keluar)->format('F');
        });

        return view('reports.surat-keluar', compact('suratKeluar', 'totalSuratKeluar', 'suratKeluarPerMounth'));
    }

    public function disposisi(){
        $disposisi = Disposisi::all();
        $totalDisposisi = $disposisi->count();
        $disposisiPerMounth = $disposisi->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->tanggal_disposisi)->format('F');
        });

        return view('reports.disposisi', compact('disposisi', 'totalDisposisi', 'disposisiPerMounth'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
