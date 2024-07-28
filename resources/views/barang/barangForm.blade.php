@extends('layout.main')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Barang</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (isset($barang->id_barang))
                            <!-- If updating, show 'Edit Barang' -->
                            <h4>Edit Barang</h4>
                            <!-- Form action URL for update -->
                            <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
                                @method('PUT')
                        @else
                            <!-- If adding, show 'Tambah Barang' -->
                            <h4>Tambah Barang</h4>
                            <!-- Form action URL for store -->
                            <form action="{{ route('barang.store') }}" method="POST">
                        @endif

                        @csrf
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (session('sukses'))
                                    <div class="alert alert-success">{{ session('sukses') }}</div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input id="nama_barang" name="nama_barang" type="text" class="form-control" value="{{ old('nama_barang', isset($barang->nama_barang) ? $barang->nama_barang : '') }}">
                                </div>
                                <div class="form-group text-right">
                                    @if (isset($barang->id_barang))
                                        <button class="btn btn-info mr-1" type="submit">Simpan</button>
                                    @else
                                        <button class="btn btn-info mr-1" type="submit">Simpan & Lanjut</button>
                                    @endif
                                    <a href="{{ route('barang.index') }}" class="btn btn-danger">Kembali</a>
                                </div>
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