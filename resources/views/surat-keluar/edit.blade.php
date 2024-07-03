@extends('layouts.app')

@section('title', 'Edit Surat Keluar')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Edit Surat Keluar</h2>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('surat-keluar.update', $suratKeluar->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
           
            {{-- Nomor Surat --}}
            <div class="form-group">
                <label for="no-surat">Nomor surat</label>
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="no-surat" placeholder="Nomor surat" name="nomor_surat" value="{{ old('nomor_surat', $suratKeluar->nomor_surat) }}">
                @error('nomor_surat')
                  <div id="no-suratFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Perihal --}}
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" placeholder="Perihal" name="perihal" value="{{ old('perihal', $suratKeluar->perihal) }}">
                @error('perihal')
                  <div id="perihalFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Tujuan --}}
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" placeholder="Tujuan" name="tujuan" value="{{ old('tujuan', $suratKeluar->tujuan) }}">
                @error('tujuan')
                  <div id="tujuanFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Isi --}}
            <div class="form-group">
                <label for="isi">Isi</label>
                {{-- <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" placeholder="Isi" name="isi" value="{{ old('isi') }}"> --}}
                <textarea class="form-control" rows="3" name="isi">{{ old('isi', $suratKeluar->isi) }}</textarea>
                @error('isi')
                  <div id="isiFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- File Surat --}}
            <div class="form-group">
                <label for="file-surat">File Surat</label>
                <div class="input-group @error('file_path') is-invalid @enderror">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file_path" id="file-surat">
                        <label class="custom-file-label" for="file-surat">Pilih file</label>
                    </div>
                </div>
                @error('file_path')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tanggal Surat Keluar --}}
            <div class="form-group">
                <label for="tgl-surat">Tgl Surat</label>
                <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tgl-surat" placeholder="Tgl Surat" name="tanggal_keluar" value="{{ old('tanggal_surat', $suratKeluar->tanggal_keluar) }}">
                @error('tanggal_keluar')
                  <div id="tgl-suratFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection