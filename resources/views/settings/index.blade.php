@extends('layouts.app')

@section('title', 'Pengaturan')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Pengaturan</h2>
                    </div>
                    
                    <div class="card-body">
                        @if (session('success'))
                          <div class="alert alert-success my-2" role="alert">
                            {{ session('success') }}
                          </div>
                        @endif

                        @if ($dataInstansi)

                        @if ($dataInstansi->logo)
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('adminlte/dist/img/'.$dataInstansi->logo) }}" alt="logo" class="img-fluid rounded-circle object-fit-cover" style="width: 100px">
                        </div>
                        @else
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('adminlte/dist/img/logo.png') }}" alt="logo" class="img-fluid" style="width: 100px">
                        </div>
                        @endif

                            <ul class="list-group text-center">
                                <li class="list-group-item">
                                    Nama Instansi : <p>
                                        {{ $dataInstansi->nama_instansi }}
                                    </p>
                                </li>
                                <li class="list-group-item">
                                    Email Instansi : <p>
                                        {{ $dataInstansi->email }}
                                    </p>
                                </li>
                                <li class="list-group-item">
                                    Alamat Instansi : <p>
                                        {{ $dataInstansi->alamat }}
                                    </p>
                                </li>
                                <li class="list-group-item">
                                    Telepon Instansi : <p>
                                        {{ $dataInstansi->nomor_telepon }}
                                    </p>
                                </li>
                            </ul>

                    </div>

                    <div class="card-footer">
                        <div class="row d-flex justify-content-center">
                            <div class="col-6">
                                <a href= "{{ route('settings.edit', $dataInstansi->id) }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-edit"></i>
                                    Ubah
                                </a>
                            </div>
                        </div>
                    </div>
                        @else
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('adminlte/dist/img/logo.png') }}" alt="logo" class="img-fluid" style="width: 100px">
                        </div>
                        <ul class="list-group text-center">

                            <li class="list-group-item">
                                Nama Instansi : <p class="font-italic text-danger">Belum ada</p>
                            </li>
                            <li class="list-group-item">
                                Email Instansi : <p class="font-italic text-danger">Belum ada</p>
                            </li>
                            <li class="list-group-item">
                                Alamat Instansi : <p class="font-italic text-danger">Belum ada</p>
                            </li>
                            <li class="list-group-item">
                                Telepon Instansi : <p class="font-italic text-danger">Belum ada</p>
                            </li>
                        </ul>
                        <div class="card-footer">
                            <div class="row d-flex justify-content-center">
                                <div class="col-6">
                                    <a href= "{{ route('settings.create') }}" class="btn btn-secondary btn-block">
                                        <i class="fas fa-edit"></i>
                                        Tambah
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection