<aside class="main-sidebar sidebar-dark-primary elevation-4">

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
                        <a href="/dashboard" class="nav-link {{ Request::is('/', 'dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/user" class="nav-link {{ Request::is('user', 'user/*/edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Profile</p>
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
                            class="nav-link {{ Request::is('administrator/proyek', 'proyek/detail/*/edit', 'laporan/*', 'insiden/*', 'survei/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>List Proyek</p>
                        </a>
                    </li>
                @endcan

                @can('Pengawas')
                    <li class="nav-header">PENGAWAS</li>
                    <a href="/dashboard" class="nav-link {{ Request::is('/', 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                    <li class="nav-item ">
                        <a href="/user" class="nav-link {{ Request::is('user', 'user/*/edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pengawas/proyek"
                            class="nav-link {{ Request::is('pengawas/proyek', 'proyek/detail/*/edit', 'rencana/*', 'laporan/*', 'insiden/*', 'survei/*', 'survei/*/edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>List Proyek</p>
                        </a>
                    </li>
                @endcan


                @can('Manajer_Proyek')
                    <li class="nav-header">MANAGER</li>
                    <a href="/dashboard" class="nav-link {{ Request::is('/', 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                    <li class="nav-item ">
                        <a href="/user" class="nav-link {{ Request::is('user', 'user/*/edit') ? 'active' : '' }}">
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


                @if (Auth::user()->role == 0)
                    <li class="nav-header">PELANGGAN</li>
                    <a href="/dashboard" class="nav-link {{ Request::is('/', 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                    <li class="nav-item ">
                        <a href="/user" class="nav-link {{ Request::is('user', 'user/*/edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

    </div>
</aside>
