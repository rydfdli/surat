@extends('layouts.app')

@section('title', 'Laporan Surat Keluar')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-header">
                    <h2 class="card-title">Laporan Surat Keluar</h2>
                </div>
                <div class="card-body">
                    <p>Total Surat Keluar: {{ $totalSuratKeluar }}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Jumlah Surat Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratKeluarPerMounth as $month => $suratKeluar)
                                <tr>
                                    <td>{{ $month }}</td>
                                    <td>{{ $suratKeluar->count() }}</td>
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

