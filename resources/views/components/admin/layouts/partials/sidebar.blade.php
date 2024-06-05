<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link d-flex justify-content-center">
        <span class="brand-text font-weight-light">H451B</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->photo ? asset('storage/user/photo/' . auth()->user()->photo) : asset('ui/backend/dist/img/user.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">


            </div>
            <div class="info">
                <a href="{{route('profile.index')}}" class="d-block">{{ auth()->user()->name }}
                    <i class='fas fa-angle-right' style="color: white"></i>
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
                <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'menu-open' : '' }}">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('setting')
                <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Setting</p>
                    </a>
                </li>
                @endcan
                @can('role-list')
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Roles</p>
                    </a>
                </li>
                @endcan


                <li class="nav-item {{ Str::startsWith(request()->url(), url('blog')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{route('blog.index')}}" class="nav-link" {{ Str::startsWith(request()->url(), url('blog')) ? 'active' : '' }}>
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('blog-category.index')}}" class="nav-link" {{ Str::startsWith(request()->url(), url('blog-')) ? 'active' : '' }}>
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>Blog Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @can('subscriber-list')
                <li class="nav-item">
                    <a href="{{route('subscribers.index')}}" class="nav-link {{request()->routeIs('subscriber.index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Subscriber</p>
                    </a>
                </li>
                @endcan

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>