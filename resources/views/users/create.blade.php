@extends('layouts.app')

@section('title', 'Tambah User')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Tambah User</h2>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                  @error('name')
                    <div id="nameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                  @error('username')
                    <div id="usernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                  @error('email')
                    <div id="emailFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                  </select>
                  @error('role')
                    <div id="roleFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                  @error('password')
                    <div id="passwordFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="password_confirmation">Konfirmasi Password</label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Password" name="password_confirmation">
                  @error('password_confirmation')
                    <div id="password_confirmationFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>

          </div>
        </form>
      </div>
    </div>
</div>
@endsection