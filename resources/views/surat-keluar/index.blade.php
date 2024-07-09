@extends('layouts.app')

@section('title', 'Surat Keluar')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Surat Keluar</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (auth()->user()->role == 'admin')
              <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary">Tambah Surat Keluar</a>
            @endif
            @if (session('success'))
              <div class="alert alert-success my-2" role="alert">
                {{ session('success') }}
              </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger my-2" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Tujuan</th>
                  <th>Isi</th>
                  <th>Tanggal Surat Keluar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($suratKeluar as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->perihal }}</td>
                            <td>{{ $surat->tujuan }}</td>
                            <td>{{ $surat->isi }}</td>
                            <td>{{ $surat->tanggal_keluar }}</td>
                            <td>
                                <a href="{{ route('surat-keluar.show', $surat->id) }}" class="btn btn-info btn-sm">Detail</a>
                                @if (auth()->user()->role == 'admin')
                                <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </div>
</div>
@endsection