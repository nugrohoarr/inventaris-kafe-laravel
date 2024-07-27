@extends('layout.main')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Barang Masuk</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Display the name of the barang -->
                        <h4 class="text-uppercase">{{ $barang_masuk->barang->nama_barang }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <p>{{ $barang_masuk->barang->nama_barang }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Spesifikasi</label>
                                    <p>{{ $barang_masuk->spesifikasi }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <p>{{ $barang_masuk->jml_masuk }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <p>{{ \Carbon\Carbon::parse($barang_masuk->tgl_masuk)->format('d-m-Y') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <p>{{ $barang_masuk->kondisi }}</p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <!-- Link to edit page -->
                                <a href="{{ route('barang-masuk.edit', $barang_masuk->id_masuk) }}" data-toggle="tooltip">
                                    <button type="button" class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>
                                </a>
                                <!-- Link to index page -->
                                <a href="{{ route('barang-masuk.index') }}">
                                    <button type="button" class="btn btn-danger" name="batal">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </section>
</div>
@endsection
