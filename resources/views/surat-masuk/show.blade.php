@extends('layouts.app')

@section('title', 'Detail Surat Masuk')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Detail Surat Masuk</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor Surat</th>
                    <td>{{ $suratMasuk->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $suratMasuk->judul }}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>{{ $suratMasuk->pengirim }}</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ $suratMasuk->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th>Isi</th>
                    <td>{{ $suratMasuk->isi }}</td>
                </tr>
                <tr>
                    <th>Status Disposisi</th>
                    <td>
                        @if ($suratMasuk->status_disposisi == 0)
                            <span class="badge badge-danger">Belum ada disposisi</span>
                        @else
                            <span class="badge badge-success">Sudah ada disposisi</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>File</th>
                    <td>
                        @if ($suratMasuk->file_path)
                            <p><a href="{{ Storage::url($suratMasuk->file_path) }}" target="_blank">Lihat file</a></p>
                        @else
                            <p>Tidak ada file</p>
                        @endif
                    </td>
                </tr>
            </table>

            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary my-2">Kembali</a>
        </div>
      </div>
    </div>
</div>
@endsection