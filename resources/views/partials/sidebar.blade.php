<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SurApp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      {{-- <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ request()->routeIs('dashboard') || request()->is('/') ? 'menu-open' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('surat-masuk.*') ? 'menu-open' : '' }}">
            <a href="{{ route('surat-masuk.index') }}" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>Surat Masuk</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('surat-keluar.*') ? 'menu-open' : '' }}">
            <a href="{{ route('surat-keluar.index') }}" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>Surat Keluar</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('disposisi.*') ? 'menu-open' : '' }}">
          <a href="{{ route('disposisi.index') }}" class="nav-link">
              <i class="nav-icon fas fa-share"></i>
              <p>Disposisi</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('reports.*') ? 'menu-open' : '' }}">
            <a href="{{ route('reports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('users.*') ? 'menu-open' : '' }}">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('settings.*') ? 'menu-open' : '' }}">
            <a href="{{ route('settings.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>