<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <span class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="../../AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </span>

    <div class="sidebar">
        <a href="{{ url('my-profile') }}">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../storage/user/{{ session('photo') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block">{{ session('firstname') }} {{ session('lastname') }}</span>
            </div>
        </div>
        </a>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../../index" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if(checkPermission('user_list'))
                <li class="nav-item">
                    <a href="../../user/user-view" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        {{-- <span class="badge badge-secondary right"></span> --}}
                        <p>
                        User Management
                        </p>
                    </a>
                </li>
                @endif

                @if(checkPermission('permission_list'))
                <li class="nav-item">
                    <a href="../../permission/permission-view" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        {{-- <span class="badge badge-secondary right"></span> --}}
                        <p>
                        Permission Management
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="../../leave-view" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        {{-- <span class="badge badge-secondary right"></span> --}}
                        <p>
                        Leave Management
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>