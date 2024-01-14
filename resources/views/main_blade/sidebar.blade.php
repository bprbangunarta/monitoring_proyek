<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MONITORING</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->profil === null)
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="/storage/{{ auth()->user()->profil }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="/user/{{ auth()->user()->id }}/edit" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @can('Administrator')
                    <li class="nav-header">ADMINISTRATOR</li>
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/administrator/create"
                            class="nav-link {{ Request::is('administrator/create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>List User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/administrator/proyek"
                            class="nav-link {{ Request::is('administrator/proyek', 'proyek/detail/6/edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>List Proyek</p>
                        </a>
                    </li>
                @endcan

                @can('Pengawas')
                    <li class="nav-header">PENGAWAS</li>
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pengawas/proyek"
                            class="nav-link {{ Request::is('pengawas/proyek', 'proyek/detail/6/edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>List Proyek</p>
                        </a>
                    </li>
                @endcan


                @can('Manajer_Proyek')
                    <li class="nav-header">MANAGER</li>
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/manager/proyek"
                            class="nav-link {{ Request::is('manager/proyek', 'proyek/detail/6/edit', 'rencana/*', 'laporan/*', 'insiden/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>List Proyek</p>
                        </a>
                    </li>
                @endcan

                {{-- <li class="nav-header">PELANGGAN</li> --}}
            </ul>
        </nav>

    </div>
</aside>
