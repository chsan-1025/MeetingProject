
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 mb-5">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-decoration-none">
        <img src="{{ URL::asset('dashboard') }}/dist/img/AdminLTELogo.png" alt="Meeting Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Meeting Room Book</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ URL::asset('dashboard') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Employee Section -->
                @canAny(['view-employees', 'create-employee', 'delete-employee'])
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-employees')
                        <li class="nav-item">
                            <a href="{{ route('admin.employees.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employees List</p>
                            </a>
                        </li>
                        @endcan
                        @can('create-employee')
                        <li class="nav-item">
                            <a href="{{ route('admin.employees.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Employee</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanAny


                <!-- Meeting Section -->
                @canAny(['view-meetings', 'create-meeting', 'delete-meeting'])
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Meetings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-meetings')
                        <li class="nav-item">
                            <a href="{{ route('admin.meetings.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meeting List</p>
                            </a>
                        </li>
                        @endcan
                        @can('create-meeting')
                        <li class="nav-item">
                            <a href="{{ route('admin.meetings.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Meeting</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanAny

                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link logout">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
