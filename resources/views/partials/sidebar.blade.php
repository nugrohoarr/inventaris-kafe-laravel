<div class="sidebar-brand">
    <a href="{{ url('/') }}">
        <img src="{{ asset('assets/img/logo.png') }}" style="width: 30px;"> Inventaris
    </a>
</div>
<ul class="sidebar-menu">
    @foreach ($users as $user)
        <li class="menu-header"><b>{{ ucfirst($user->level) }}</b></li>
        <li><a href="{{ url('/') }}" class="nav-link"><i class="fas fa-fire"></i> Dashboard</a></li>
        
        @if ($user->level == 'administrator')
            <li><a href="{{ url('user') }}" class="nav-link"><i class="fas fa-user"></i> Data User</a></li>
            <li><a href="{{ url('barang') }}" class="nav-link"><i class="fas fa-archive"></i> Data Barang</a></li>
            <li><a href="{{ url('barang_masuk') }}" class="nav-link"><i class="fas fa-download"></i> Barang Masuk</a></li>
            <li><a href="{{ url('barang_keluar') }}" class="nav-link"><i class="fas fa-upload"></i> Barang Keluar</a></li>
        @elseif ($user->level == 'manajemen')
            <li><a href="{{ url('barang') }}" class="nav-link"><i class="fas fa-archive"></i> Data Barang</a></li>
            <li><a href="{{ url('barang_masuk') }}" class="nav-link"><i class="fas fa-download"></i> Barang Masuk</a></li>
            <li><a href="{{ url('barang_keluar') }}" class="nav-link"><i class="fas fa-upload"></i> Barang Keluar</a></li>
        @elseif ($user->level == 'peminjam')
            <li><a href="{{ url('barang') }}" class="nav-link"><i class="fas fa-box"></i> Data Barang</a></li>
            <li><a href="{{ url('barang_pinjam') }}" class="nav-link"><i class="fas fa-book"></i> Barang yang Dipinjam</a></li>
        @endif
    @endforeach
</ul>
<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="{{ url('login/logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split" onclick="return confirm('Yakin ingin Logout?')">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>
