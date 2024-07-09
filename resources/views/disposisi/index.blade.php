@extends('layouts.app')

@section('title', 'Disposisi')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Disposisi</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary">Tambah Surat Keluar</a> --}}
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
                  <th>Tanggal Disposisi</th>
                  <th>No Surat</th>
                  <th>Tujuan</th>
                  <th>Isi</th>
                  <th>Sifat</th>
                  <th>Batas Waktu</th>
                  @if (auth()->user()->role == 'superadmin')
                    <th>Aksi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($disposisis as $disposisi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $disposisi->tanggal_disposisi }}</td>
                            <td><a href="{{ route('surat-masuk.show', $disposisi->suratmasuk->id) }}">{{ $disposisi->suratmasuk->nomor_surat }}</a></td>
                            <td>{{ $disposisi->tujuan }}</td>
                            <td>{{ $disposisi->isi_disposisi }}</td>
                            <td>
                              @if ($disposisi->sifat_disposisi === '1')
                                  <span class="badge badge-primary">Biasa</span>
                              @elseif ($disposisi->sifat_disposisi === '2')
                                  <span class="badge badge-warning">Penting</span>
                              @elseif ($disposisi->sifat_disposisi === '3')
                                  <span class="badge badge-danger">Sangat Penting</span>  
                              @endif
                            </td>
                            <td>{{ $disposisi->batas_waktu }}</td>
                            @if (auth()->user()->role == 'superadmin')
                              <td>
                                  <a href="{{ route('disposisi.edit', $disposisi->id) }}" class="btn btn-warning btn-sm my-2">Edit</a>
                              </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </div>
</div>
@endsection