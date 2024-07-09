@extends('layouts.app')

@section('title', 'Edit Disposisi')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Edit Disposisi')</h2>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
           
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" placeholder="Tujuan" name="tujuan" value="{{ old('tujuan', $disposisi->tujuan) }}">
                @error('tujuan')
                  <div id="tujuanFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            {{-- Isi disposisi --}}
            <div class="form-group">
                <label for="isi-disposisi">Isi disposisi</label>
                <textarea class="form-control @error('isi_disposisi') is-invalid @enderror" rows="3" id="isi-disposisi" placeholder="Isi disposisi" name="isi_disposisi">{{ old('isi_disposisi', $disposisi->isi_disposisi) }}</textarea>
                @error('isi_disposisi')
                  <div id="isi-disposisiFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Sifat disposisi --}}
            <div class="form-group">
                <label for="sifat-disposisi">Sifat disposisi</label>
                <select class="form-control @error('sifat_disposisi') is-invalid @enderror" id="sifat-disposisi" name="sifat_disposisi">
                    <option value="1" {{ old('sifat_disposisi', $disposisi->sifat_disposisi) == 1 ? 'selected' : '' }}>Biasa</option>
                    <option value="2" {{ old('sifat_disposisi', $disposisi->sifat_disposisi) == 2 ? 'selected' : '' }}>Penting</option>
                    <option value="3" {{ old('sifat_disposisi', $disposisi->sifat_disposisi) == 3 ? 'selected' : '' }}>Sangat Penting</option>
                </select>
                @error('sifat_disposisi')
                  <div id="sifat-disposisiFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Batas Waktu --}}
            <div class="form-group">
                <label for="batas-waktu">Batas Waktu</label>
                <input type="date" class="form-control @error('batas_waktu') is-invalid @enderror" id="batas-waktu" placeholder="Batas Waktu" name="batas_waktu" value="{{ old('batas_waktu', $disposisi->batas_waktu) }}">
                @error('batas_waktu')
                  <div id="batas-waktuFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Catatan --}}
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control @error('catatan') is-invalid @enderror" rows="3" id="catatan" placeholder="Catatan" name="catatan">{{ old('catatan', $disposisi->catatan) }}</textarea>
                @error('catatan')
                  <div id="catatanFeedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            {{-- Tanggal Disposisi --}}
            <div class="form-group">
                <label>Tanggal Disposisi:</label>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control @error('date') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="tanggal_disposisi" value="{{ old('date', $disposisi->tanggal_disposisi) }}">
                  @error('date')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection