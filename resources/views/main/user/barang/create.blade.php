@extends('layout.navbar')
@section('content')
    <div class="container-fluid">
        <!-- judul halaman -->
        <h1 class="h4 mb-4 text-gray-800"><i class="fas fa-clone fa-fw mr-2"></i>Barang</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- judul form -->
                <h6 class="m-0 font-weight-bold">Entri Data Barang</h6>
            </div>
            <div class="card-body">
                <!-- form entri data -->
                <form action="{{ route('admin.barang.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group col-lg-5 pl-0">
                        <label>Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" name="barang" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">Nama barang tidak boleh kosong.</div>
                    </div>

                    <div class="form-group col-lg-5 pl-0">
                        <label>Stok <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <input type="text" name="stok" class="form-control mask_money" autocomplete="off"
                                required>
                            <div class="invalid-feedback">Stok tidak boleh kosong.</div>
                        </div>
                    </div>

                    <hr class="mt-5">

                    <div class="form-group pt-3">
                        <!-- tombol simpan data -->
                        <input type="submit" class="btn btn-info pl-4 pr-4 mr-2">
                        <!-- tombol kembali ke halaman tampil data -->
                        <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary pl-4 pr-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
