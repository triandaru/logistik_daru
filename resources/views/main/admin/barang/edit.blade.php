@extends('layout.navbar')
@section('content')
    <div class="container-fluid">
        <!-- Judul halaman -->
        <h1 class="h4 mb-4 text-gray-800"><i class="fas fa-clone fa-fw mr-2"></i>Barang</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Judul form -->
                <h6 class="m-0 font-weight-bold">Ubah Data Barang</h6>
            </div>
            <div class="card-body">
                <!-- Form ubah data -->
                <form action="{{ route('admin.barang.update', $barang->kode_barang) }}" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Input hidden untuk ID barang -->
                    <input type="hidden" name="kode_barang" value="{{ $barang->kode_barang }}">

                    <div class="form-group col-lg-5 pl-0">
                        <label>Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" name="barang" class="form-control @error('barang') is-invalid @enderror"
                            autocomplete="off" value="{{ old('barang', $barang->nama_barang) }}" required>
                        @error('barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="invalid-feedback">Nama Barang tidak boleh kosong.</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-5 pl-0">
                        <label>Stok <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                autocomplete="off" value="{{ old('stok', $barang->stok) }}" required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Stok tidak boleh kosong.</div>
                            @enderror
                        </div>
                    </div>


                    <hr class="mt-5">

                    <div class="form-group pt-3">
                        <!-- Tombol simpan data -->
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-info pl-4 pr-4 mr-2">
                        <!-- Tombol kembali ke halaman tampil data -->
                        <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary pl-4 pr-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
