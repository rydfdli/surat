@extends('layouts.app')

@section('title', 'Pengaturan')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Edit Pengaturan</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('settings.update', $dataInstansi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_instansi">Nama Instansi</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi', $dataInstansi->nama_instansi) }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="email">Email Instansi</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $dataInstansi->email) }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="alamat">Alamat Instansi</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $dataInstansi->alamat) }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon Instansi</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $dataInstansi->nomor_telepon) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="website">Website Instansi</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $dataInstansi->website) }}" required>
                            </div>
                            
    
                            <div class="form-group">
                                <label for="logo">Logo Instansi</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>
    
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection