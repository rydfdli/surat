@extends('layouts.app')

@section('title', 'Laporan Surat Masuk')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Laporan Surat Masuk</h2>
                </div>
                <div class="card-body">
                    <p>Total Surat Masuk: {{ $totalSuratMasuk }}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Jumlah Surat Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratMasukPerMounth as $month => $suratMasuk)
                                <tr>
                                    <td>{{ $month }}</td>
                                    <td>{{ $suratMasuk->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

