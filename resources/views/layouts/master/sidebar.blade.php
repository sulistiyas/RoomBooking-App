  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="no-border" type="submit">
              @php
                   $id = Auth::user()->id;

                  // get data for fetch
                  $users = DB::table('users')
                      ->leftJoin('detail_user', 'users.id', '=', 'detail_user.id_user')
                      ->where('detail_user.id_user', '=', $id)
                      ->get();
                  foreach ($users as $user) {
                    echo $user->name;
                  }
              @endphp
            </button>
          </form>
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
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            {{-- <a href="/dashboard_admin" class="nav-link active"> --}}
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'nav-link active' : 'nav-link' }}">
              
              <i class="far fa fa-house-user nav-icon"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview active">
              <li class="nav-item">
                <a href="{{ route('room-view') }}" class="
                  @php
                      if (request()->is('admin/room/list')) {
                        echo 'nav-link active';
                      } elseif (request()->is('admin/room/create')) {
                        echo 'nav-link active';
                      } else {
                        echo 'nav-link';
                      }
                      // {{ request()->is('admin/room/list') ? 'nav-link active' : 'nav-link' }}
                  @endphp
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('asset-view') }}" class="
                @php
                    if (request()->is('admin/assets/assets_master')) {
                      echo 'nav-link active';
                    } elseif (request()->is('admin/assets/create')) {
                      echo 'nav-link active';
                    } else {
                      echo 'nav-link';
                    }
                    // {{ request()->is('admin/room/list') ? 'nav-link active' : 'nav-link' }}
                @endphp
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user-view') }}" class="
                  @php
                      if (request()->is('admin/user/list')) {
                        echo 'nav-link active';
                      } elseif (request()->is('admin/user/create')) {
                        echo 'nav-link active';
                      } else {
                        echo 'nav-link';
                      }
                      // {{ request()->is('admin/room/list') ? 'nav-link active' : 'nav-link' }}
                  @endphp
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Room Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('room-asset') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Assets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('room-schedule') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Schedule</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Account Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Schedule</p>
                </a>
              </li>
            </ul>
          </li> --}}
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-link pos-right" type="submit">
          <i class="fas fa-power-off"></i>
        </button>
      </form>
      <a href="#" class="btn btn-link"><i class="fas fa-user"></i></a>
      <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
      
      {{-- <a href="#" class="btn btn-link pos-right"><i class="fas fa-power-off"></i></a> --}}
      {{-- <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a> --}}
    </div>
    <!-- /.sidebar-custom -->
  </aside>
 
