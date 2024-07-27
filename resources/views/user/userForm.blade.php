@extends('layout.main')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form User</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ isset($user) ? route('users.update', $user->id_user) : route('users.store') }}" method="POST">
                            @csrf
                            @if(isset($user))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control text-capitalize" name="level">
                                            <option value="manajemen" {{ (isset($user) && $user->level == 'manajemen') ? 'selected' : '' }}>manajemen</option>
                                            <option value="administrator" {{ (isset($user) && $user->level == 'administrator') ? 'selected' : '' }}>administrator</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input name="nama" type="text" class="form-control" value="{{ $user->nama ?? old('nama') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control" value="{{ $user->username ?? old('username') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control">
                                        @if(isset($user))
                                            <small>Kosongkan saja Jika tidak Mengganti Password</small>
                                        @endif
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-info mr-1" type="submit">Simpan</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
