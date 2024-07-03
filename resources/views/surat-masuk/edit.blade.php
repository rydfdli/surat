@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Surat Masuk</h2>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('surat-masuk.update', $suratMasuk->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            {{-- Nomor surat --}}
            <div class="form-group">
                <label for="no-surat">Nomor surat</label>
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="no-surat" placeholder="Nomor surat" name="nomor_surat" value="{{ old('nomor_surat', $suratMasuk->nomor_surat) }}" disabled>
                @error('nomor_surat')
                  <div id="no-suratFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            {{-- Judul --}}
            <div class="form-group">
                <label for="judul-surat">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul-surat" placeholder="Judul surat" name="judul" value="{{ old('judul', $suratMasuk->judul) }}">
                @error('judul')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            {{-- Pengirim --}}
            <div class="form-group">
                <label for="pengirim-surat">Pengirim</label>
                <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim-surat" placeholder="Pengirim surat" name="pengirim" value="{{ old('pengirim', $suratMasuk->pengirim) }}">
                @error('pengirim')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            {{-- Tanggal surat --}}
            <div class="form-group">
                <label>Tanggal surat:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal_masuk" value="{{ old('tanggal_masuk', $suratMasuk->tanggal_masuk) }}">
                  @error('tanggal_masuk')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            {{-- Isi surat --}}
            <div class="form-group">
                <label>Isi surat</label>
                <textarea class="form-control" rows="3" name="isi">{{ old('isi', $suratMasuk->isi) }}</textarea>
            </div>

              {{-- <div class="form-group">
                <label for="exampleInputFile">Scan surat</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('file_path') is-invalid @enderror" id="exampleInputFile" name="file_path">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('file_path')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div> --}}

              <div class="form-group">
                <label for="file">Unggah PDF</label>
                <div class="input-group @error('file_path') is-invalid @enderror">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file_path" id="file">
                        <label class="custom-file-label" for="file">Pilih file</label>
                    </div>
                </div>
                @error('file_path')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection