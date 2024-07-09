@extends('layouts.app')

@section('title', 'Managemen User')
@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Managemen User</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        

          @if (auth()->user()->role == 'superadmin')
            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
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
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                @if (auth()->user()->role == 'superadmin')
                    <th>Aksi</th>
                @endif
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge badge-{{ $user->role == 'admin' ? 'success' : 'info' }}">{{ $user->role }}</span>
                        </td>
                        @if (auth()->user()->role == 'superadmin')
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Hapus</button>
                                </form>
                                {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confrim('Apakah anda yakin ingin menghapus user ini')">Hapus</a> --}}
                            </td>
                        @endif
                    </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
  </div>
@endsection