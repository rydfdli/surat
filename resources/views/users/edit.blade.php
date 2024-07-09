@extends('layouts.app')

@section('title', 'Edit User')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Edit User</h2>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">

              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name', $user->name) }}">
                  @error('name')
                    <div id="nameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username', $user->username) }}">
                  @error('username')
                    <div id="usernameFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                  @error('email')
                    <div id="emailFeedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                    <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                    <option value="superadmin" @if ($user->role == 'superadmin') selected @endif>Super Admin</option>
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