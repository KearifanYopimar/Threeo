@extends('backend.layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Produk</div>
                    <div class="card-body">
                        <a href="{{ route('product.tambah') }}" class="btn btn-success mb-3">Tambah</a> <!-- Tombol Tambah -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id_produk }}</td>
                                    <td>{{ $product->Product_Name }}</td>
                                    <td>{{ $product->Price }}</td>
                                    <td>{{ $product->kategori->nama_kategori }}</td> <!-- Perubahan disini -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Ubah</a>
                                        <a href="#" onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-secondary btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
