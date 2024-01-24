@php
    $cur_route = Route::current()->getName();
    //dd( $cur_route);
    //dd($current_url);
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{ auth()->user()->name }}
          </a>
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
                <a  href="{{ route('backend.dashboard') }}" class="nav-link {{ $cur_route == 'backend.dashboard' ? 'active':'' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.users.index') }}" class="nav-link {{ $cur_route == 'backend.users.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.pages.index') }}" class="nav-link {{ $cur_route == 'backend.pages.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-pager"></i>
                  <p>
                    Pages
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.slides.index') }}" class="nav-link {{ $cur_route == 'backend.slides.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-sliders-h"></i>
                  <p>
                    Slides
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.testimonials.index') }}" class="nav-link {{ $cur_route == 'backend.testimonials.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-comment"></i>
                  <p>
                    Testimonials
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.teams.index') }}" class="nav-link {{ $cur_route == 'backend.teams.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-user-circle"></i>
                  <p>
                    Teams
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.services.index') }}" class="nav-link {{ $cur_route == 'backend.services.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-tasks"></i>
                  <p>
                    Services
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.settings.index') }}" class="nav-link {{ $cur_route == 'backend.settings.index' ? 'active':'' }}">
                  <i class="nav-icon fa fa-wrench"></i>
                  <p>
                    System Settings
                  </p>
                </a>
              </li>
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
