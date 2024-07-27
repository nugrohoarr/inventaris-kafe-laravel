@extends('layout.main')

@section('content')
<!-- Main Content -->
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Barang List</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Stok Barang</h4>
                            <div class="card-header-action">
                                <a href="{{ route('barang.create') }}">
                                    <button class="btn btn-lg btn-info" type="submit">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($barangs as $index => $barang)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>
                                                    <span class="text-capitalize">{{ $barang->nama_barang }}</span>
                                                </td>
                                                <td>
                                                    <div class="badge badge-light">{{ $barang->jml_masuk }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('barang.edit', $barang->id_barang) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No data available</td>
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
