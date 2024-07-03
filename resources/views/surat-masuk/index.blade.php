@extends('layouts.app')

@section('title', 'Surat Masuk')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Surat Masuk</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary">Tambah Surat Masuk</a>
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
                  <th>Judul</th>
                  <th>Pengirim</th>
                  <th>Tanggal Masuk</th>
                  <th>Status Disposisi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($suratmasuk as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->judul }}</td>
                            <td>{{ $surat->pengirim }}</td>
                            <td>{{ $surat->tanggal_masuk }}</td>
                            <td>
                                @if ($surat->status_disposisi == 0)
                                    <span class="badge badge-danger">Belum ada disposisi</span>
                                @else
                                    <span class="badge badge-success">Sudah ada disposisi</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('surat-masuk.show', $surat->id) }}" class="btn btn-info btn-sm my-2">Detail</a>
                                <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="btn btn-warning btn-sm my-2">Edit</a>
                                <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                                @if (!$surat->status_disposisi)
                                    <a href="{{ route('surat-masuk.disposisi.create', $surat->id)}}" class="btn btn-primary btn-sm">Disposisi</a>
                                @else
                                    
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