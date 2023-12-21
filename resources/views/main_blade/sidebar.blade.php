<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
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
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @can('Administrator')
                    <li class="nav-item {{ Request::is('administrator/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('administrator/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Administrator
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrator/create"
                                    class="nav-link {{ Request::is('administrator/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Anggota</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrator/proyek"
                                    class="nav-link {{ Request::is('administrator/proyek*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proyek</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ Request::is('pengawas/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('pengawas/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Pengawas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pengawas/proyek"
                                    class="nav-link {{ Request::is('pengawas/proyek*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proyek</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ Request::is('manager/proyek*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('manager/proyek*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Manajer Proyek
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/manager/proyek"
                                    class="nav-link {{ Request::is('manager/proyek*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proyek</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('Pengawas')
                    <li class="nav-item {{ Request::is('pengawas/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('pengawas/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Pengawas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pengawas/proyek"
                                    class="nav-link {{ Request::is('pengawas/proyek*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proyek</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ Request::is('manager/proyek*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('manager/proyek*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Manajer Proyek
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/manager/proyek"
                                    class="nav-link {{ Request::is('manager/proyek*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proyek</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan


                @can('Manajer_Proyek')
                    <li class="nav-item {{ Request::is('manager/proyek*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('manager/proyek*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Manajer Proyek
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/manager/proyek"
                                    class="nav-link {{ Request::is('manager/proyek*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proyek</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li class="nav-item {{ Request::is('user') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Client
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>
</aside>
