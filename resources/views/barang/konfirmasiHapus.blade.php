@extends('layout.main')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Konfirmasi Hapus Data Barang</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-mt">
                        <div class="card-header">
                            <h4 class="text-danger">Konfirmasi</h4>
                        </div>
                        <div class="card-body">
                            <p>Segala data yang berhubungan dengan data ini seperti <mark>BARANG MASUK</mark>, <mark>BARANG KELUAR</mark> dan <mark>PEMINJAMAN BARANG</mark> juga akan ikut terhapus!</p>
                            <p>Tetap Hapus data ID Barang {{ $id }}?</p>
                            <a href="{{ route('barang.destroy', $id) }}" class="btn btn-danger btn-action" data-toggle="tooltip" title="Tetap Hapus"><i class="fas fa-trash"></i> Hapus</a>
                            <a href="{{ route('barang.index') }}" class="btn btn-primary btn-action" data-toggle="tooltip" title="Batal"><i class="fas fa-times"></i> Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
