@extends('layouts.app')

@section('title', 'Detail Surat Keluar')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Detail Surat Keluar</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor Surat</th>
                    <td>{{ $suratKeluar->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>{{ $suratKeluar->perihal }}</td>
                </tr>
                <tr>
                    <th>Tujuan</th>
                    <td>{{ $suratKeluar->tujuan }}</td>
                </tr>
                <tr>
                    <th>Isi</th>
                    <td>{{ $suratKeluar->isi }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td>
                        @if ($suratKeluar->file_path)
                            <p><a href="{{ Storage::url($suratKeluar->file_path) }}" target="_blank">Lihat file</a></p>
                        @else
                            <p>Tidak ada file</p>
                        @endif
                    </td>
                </tr>
            </table>

            <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary my-2">Kembali</a>
        </div>
      </div>
    </div>
</div>
@endsection