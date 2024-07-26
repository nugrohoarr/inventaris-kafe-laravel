@extends('layout.main')

@section('content')
<div class="section-header">
    <h1>User List</h1>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Data User</h4>
            <div class="card-header-action">
                <a href="{{ url('user/create') }}" class="btn btn-primary">Tambah Baru</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ ucfirst($user->level) }}</td>
                                <td>
                                    <a href="{{ url('user/edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('user/delete', $user->id) }}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
