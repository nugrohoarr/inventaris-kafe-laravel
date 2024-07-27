@extends('layout.main')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Barang Masuk</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (isset($barang_masukId))
                            <!-- If updating, use the update route -->
                            <form action="{{ route('barang-masuk.update', $barang_masukId->id_masuk) }}" method="POST">
                            @method('PUT')
                        @else
                            <!-- If adding new, use the store route -->
                            <form action="{{ route('barang-masuk.store') }}" method="POST">
                        @endif
                        @csrf
                        <h4>{{ isset($barang_masukId) ? 'Edit Barang Masuk' : 'Tambah Barang Masuk' }}</h4>
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
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select class="form-control select2 text-capitalize" name="id_barang">
                                        @foreach ($nama_barang as $data)
                                            <option value="{{ $data->id_barang }}" {{ (isset($barang_masukId) && $barang_masukId->id_barang == $data->id_barang) ? 'selected' : '' }}>
                                                {{ $data->nama_barang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input name="jml_masuk" type="number" class="form-control" value="{{ old('jml_masuk', isset($barang_masukId) ? $barang_masukId->jml_masuk : '') }}">
                                </div>
                                <div class="form-group">
                                    <label>Spesifikasi</label>
                                    <textarea class="form-control" name="spesifikasi">{{ old('spesifikasi', isset($barang_masukId) ? $barang_masukId->spesifikasi : '') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input name="kondisi" type="text" class="form-control" value="{{ old('kondisi', isset($barang_masukId) ? $barang_masukId->kondisi : '') }}">
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-info mr-1" type="submit">Simpan</button>
                                    <a href="{{ route('barang-masuk.index') }}">
                                        <button type="button" class="btn btn-danger" name="batal">Kembali</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
