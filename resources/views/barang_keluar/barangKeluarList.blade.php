@extends('layout.main')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Barang Keluar</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Barang Keluar</h4>
                            <div class="card-header-action">
                                <a href="{{ route('barang-keluar.create') }}">
                                    <button class="btn btn-lg btn-info" type="submit"><i class="fas fa-plus"></i> Tambah Baru</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Success and Error Messages -->
                            @if(session('sukses'))
                                <div class="alert alert-success">
                                    {{ session('sukses') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($barang_keluar as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="text-capitalize">{{ $data->barang->nama_barang }}</span>
                                                    <div class="table-links">
                                                        <a href="{{ route('barang-keluar.edit', $data->id_keluar) }}">
                                                            <span class="badge badge-primary">Edit <i class="fas fa-pencil-alt"></i></span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-light">{{ $data->jml_keluar }}</div>
                                                </td>
                                                <td>{{ $data->deskripsi }}</td>
                                                <td>
                                                    <div class="badge badge-light">{{ \Carbon\Carbon::parse($data->tgl_keluar)->format('d-m-Y') }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('barang-keluar.edit', $data->id_keluar) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('barang-keluar.destroy', $data->id_keluar) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Yakin Hapus barang?')" data-toggle="tooltip" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No data available</td>
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
