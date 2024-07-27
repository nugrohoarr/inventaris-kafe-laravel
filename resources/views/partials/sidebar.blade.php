<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" style="width: 30px;"> Inventaris</a>
        </div>
        <!-- sidebar -->
        <ul class="sidebar-menu">
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown"><i class="fas fa-user text-danger"></i><span>Hai, {{ $level->nama ?? 'NULL' }}</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); return confirm('Yakin ingin Logout?')">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-header"><b>{{ $level->level }}</b></li>
            <li>
                <a href="{{ url('/dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            @if ($level->level == 'administrator')
                <li><a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Data User</span></a></li>
                
                <li class="menu-header"><b>Manajemen</b> Barang</li>
                <li><a class="nav-link" href="barang"><i class="fas fa-archive"></i> <span>Data Barang</span></a></li>
                <li><a class="nav-link" href="barang-masuk"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li>
                <li><a class="nav-link" href="barang-keluar"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
            @endif

            @if ($level->level == 'manajemen')
                <li class="menu-header"><b>Manajemen</b> Barang</li>
                <li><a href="" class="nav-link"><i class="fas fa-user"></i><span>Data Barang</span></a></li>
                <li><a class="nav-link" href=""><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li>
                <li><a class="nav-link" href=""><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
            @endif
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        <a href="#" class="btn btn-danger btn-lg btn-block btn-icon-split" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); return confirm('Yakin ingin Logout?')">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
    </aside>
</div>