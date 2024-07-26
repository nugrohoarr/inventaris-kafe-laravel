<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" style="width: 30px;"> Inventaris</a>
        </div>
        <ul class="sidebar-menu">
            @foreach ($users as $user)
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user text-danger"></i><span>Hai, {{ $user->nama }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link text-danger" href="{{ url('login/logout') }}" onclick="return confirm('Yakin ingin Logout?')"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="menu-header"><b>{{ ucfirst($user->level) }}</b></li>
                <li>
                    <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                @if ($user->level == 'administrator')
                    <li><a href="{{ url('user') }}" class="nav-link"><i class="fas fa-user"></i><span>Data User</span></a></li>
                    <li class="menu-header"><b>Manajemen</b> Barang</li>
                    <li><a class="nav-link" href="{{ url('barang') }}"><i class="fas fa-archive"></i> <span>Data Barang</span></a></li>
                    <li><a class="nav-link" href="{{ url('barang_masuk') }}"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li>
                    <li><a class="nav-link" href="{{ url('barang_keluar') }}"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
                @elseif ($user->level == 'manajemen')
                    <li class="menu-header"><b>Manajemen</b> Barang</li>
                    <li><a href="{{ url('barang') }}" class="nav-link"><i class="fas fa-user"></i><span>Data Barang</span></a></li>
                    <li><a class="nav-link" href="{{ url('barang_masuk') }}"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li>
                    <li><a class="nav-link" href="{{ url('barang_keluar') }}"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
                @elseif ($user->level == 'peminjam')
                    <li class="menu-header"><b>Peminjam</b></li>
                    <li><a href="{{ url('barang') }}" class="nav-link"><i class="fas fa-box"></i><span>Data Barang</span></a></li>
                    <li><a class="nav-link" href="{{ url('barang_pinjam') }}"><i class="fas fa-book"></i> <span>Barang yang Dipinjam</span></a></li>
                @endif
            @endforeach
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ url('login/logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split" onclick="return confirm('Yakin ingin Logout?')">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
