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
                  <th>Aksi</th>
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
                              @if ($disposisi->sifat_disposisi === 'Biasa')
                                  <span class="badge badge-primary">{{ $disposisi->sifat_disposisi }}</span>
                              @elseif ($disposisi->sifat_disposisi === 'Penting')
                                  <span class="badge badge-warning">{{ $disposisi->sifat_disposisi }}</span>
                              @elseif ($disposisi->sifat_disposisi === 'Sangat Penting')
                                  <span class="badge badge-danger">{{ $disposisi->sifat_disposisi }}</span>  
                              @endif
                          </td>
                            <td>{{ $disposisi->batas_waktu }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </div>
</div>
@endsection