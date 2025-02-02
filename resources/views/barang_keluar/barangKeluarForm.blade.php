@extends('layout.main')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Barang Keluar</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (isset($barang_keluarId))
                            <!-- If updating, use the update route -->
                            <h4>Edit Barang Keluar</h4>
                        @else
                            <!-- If adding new, use the store route -->
                            <h4>Tambah Barang Keluar</h4>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Display success or error message -->
                                @if (session('sukses'))
                                    <div class="alert alert-success">{{ session('sukses') }}</div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <form action="{{ isset($barang_keluarId) ? route('barang-keluar.update', $barang_keluarId->id_keluar) : route('barang-keluar.store') }}" method="POST">
                                    @csrf
                                    @if (isset($barang_keluarId))
                                        @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <select class="form-control select2 text-capitalize" name="id_barang">
                                            @if (isset($barang_keluarId))
                                                <option value="{{ $barang_keluarId->id_barang }}">{{ $barang_keluarId->barang->nama_barang }}</option>
                                                <option disabled>-</option>
                                            @endif
                                            @foreach ($nama_barang as $data)
                                                <option value="{{ $data->id_barang }}">{{ $data->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Keluar</label>
                                        <input name="jml_keluar" type="number" class="form-control" value="{{ old('jml_keluar', isset($barang_keluarId) ? $barang_keluarId->jml_keluar : '') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi">{{ old('deskripsi', isset($barang_keluarId) ? $barang_keluarId->deskripsi : '') }}</textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-info mr-1" type="submit">Simpan</button>
                                        <a href="{{ route('barang-keluar.index') }}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
