<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataInstansi = Setting::first();
        return view('settings.index', compact('dataInstansi'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function edit()
    {
        $dataInstansi = Setting::first();
        return view('settings.edit', compact('dataInstansi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        
        $validated = $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'logo' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        ]);

        $dataInstansi = Setting::find($id);
       
        if($request->hasFile('logo')){
            if ($dataInstansi->logo && File::exists(public_path('adminlte/dist/img/'.$dataInstansi->logo))) {
                File::delete(public_path('adminlte/dist/img/'.$dataInstansi->logo));
            } 
            $filename = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('adminlte/dist/img'), $filename);
            $validated['logo'] = $filename;
        }

        $dataInstansi->update($validated);
        return redirect()->route('settings.index')->with('success', 'Data instansi berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
