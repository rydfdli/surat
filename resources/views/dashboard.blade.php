@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
{{-- <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blank Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section> --}}

  <!-- Main content -->
  <section class="content">

    <h1>Dashboard</h1>
    <!-- Default box -->
    <div class="row">
        {{-- Surat Masuk --}}
        <div class="col-4">
          <div class="small-box bg-success">
            <div class="inner">
               <h3>{{ $suratMasukCount }}</h3>
               <p>Surat Masuk</p>
            </div>
            <div class="icon">
            <i class="ion ion-email"></i>
          </div>
            <a href="{{ route('surat-masuk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        {{-- Surat Keluar --}}
        <div class="col-4">
          <div class="small-box bg-warning">
            <div class="inner">
               <h3>{{ $suratKeluarCount }}</h3>
               <p>Surat Keluar</p>
            </div>
            <div class="icon">
            <i class="ion ion-forward"></i>
          </div>
            <a href="{{ route('surat-keluar.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        {{-- Disposisi --}}
        <div class="col-4">
          <div class="small-box bg-info">
            <div class="inner">
               <h3>{{ $disposisiCount }}</h3>
               <p>Disposisi</p>
            </div>
            <div class="icon">
            <i class="ion ion-paperclip"></i>
          </div>
            <a href="{{ route('disposisi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>


  </section>
@endsection