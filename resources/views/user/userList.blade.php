@extends('layout.main')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
        </div>
        
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data User</h4>
                            <div class="card-header-action">
                                <a href="{{ route('users.create') }}" class="btn btn-lg btn-info"><i class="fas fa-plus"></i> Tambah Baru</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>                                 
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                 
                                        @forelse($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->id_user }}</td>
                                                <td>
                                                    <span class="text-uppercase">{{ $user->nama }}</span>
                                                    <div class="table-links">
                                                        <a href="{{ route('users.edit', $user) }}"><span class="badge badge-primary">Edit <i class="fas fa-pencil-alt"></i></span></a>
                                                    </div>
                                                </td>
                                                <td><span>@</span>{{ $user->username }}</td>
                                                <td class="text-capitalize"><div class="badge badge-secondary">{{ $user->level }}</div></td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Yakin Hapus user {{ $user->username }}?')" data-toggle="tooltip" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data user</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection