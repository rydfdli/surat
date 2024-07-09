@extends('layouts.app')

@section('title', 'Laporan')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Laporan</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('reports.surat-masuk') }}">Laporan Surat Masuk</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('reports.surat-keluar') }}">Laporan Surat Keluar</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('reports.disposisi') }}">Laporan Disposisi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection