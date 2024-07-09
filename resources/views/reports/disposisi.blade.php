@extends('layouts.app')

@section('title', 'Laporan Disposisi')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-header">
                    <h2 class="card-title">Laporan Disposisi</h2>
                </div>
                <div class="card-body">
                    <p>Total Disposisi : {{ $totalDisposisi }}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Jumlah Disposisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disposisiPerMounth as $month => $disposisi)
                                <tr>
                                    <td>{{ $month }}</td>
                                    <td>{{ $disposisi->count() }}</td>
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

