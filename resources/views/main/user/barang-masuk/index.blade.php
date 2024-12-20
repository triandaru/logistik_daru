@extends('layout.navbar')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Judul halaman -->
            <h1 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-clipboard-list mr-2"></i>Barang Masuk</h1>
            <!-- Tombol entri data -->
            <a href="{{ route('admin.barang-masuk.create') }}" class="btn btn-warning btn-icon-split">
                <span class="icon"><i class="fas fa-plus-circle"></i></span>
                <span class="text">Entri Data</span>
            </a>
        </div>

        <!-- Menampilkan pesan sesuai dengan proses yang dijalankan -->
        @if (session('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle mr-1"></i> Sukses!</strong> {{ session('pesan') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Judul tabel -->
                <h6 class="m-0 font-weight-bold">Data Barang Masuk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Tabel untuk menampilkan data dari database -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">NO Barang Masuk</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Asal Barang</th>
                                <th class="text-center">Tanggal Masuk</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang_masuks as $index => $data)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        {{ $data->nama_barang }}
                                    </td>
                                    <td>{{ $data->qty }}</td>
                                    <td class="text-center">{{ $data->origin }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d-m-Y') }}
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <!-- Tombol cetak nota -->
                                            {{-- <a href="{{ route('admin.barang-masuk.cetak', $data->id_transaksi) }}"
                                                target="_blank" class="btn btn-warning btn-circle btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="Cetak Nota">
                                                <i class="fas fa-print"></i>
                                            </a> --}}
                                            <!-- Tombol ubah data -->
                                            {{-- <a href="{{ route('admin.barang-masuk.edit', $data->no_barang_masuk) }}"
                                                class="btn btn-info btn-circle btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Ubah">
                                                <i class="fas fa-edit"></i>
                                            </a> --}}
                                            <!-- Tombol hapus data -->
                                            {{-- <form action="{{ route('admin.transaksi.destroy', $data->id_transaksi) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Anda yakin ingin menghapus data user dengan username {{ $data->nama_pelanggan }}?')"
                                                    class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                            <button type="button" class="btn btn-danger btn-circle btn-sm"
                                                data-toggle="modal" data-target="#hapusModal{{ $data->no_barang_masuk }}"
                                                data-toggle="tooltip" data-placement="top" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusModal{{ $data->no_barang_masuk }}" tabindex="-1"
                                    role="dialog" aria-labelledby="hapusModalLabel{{ $data->no_barang_masuk }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel{{ $data->no_barang_masuk }}"><i
                                                        class="fas fa-trash-alt fa-fw mr-1"></i>Konfirmasi Hapus</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data transaksi barang masuk
                                                <strong>{{ $data->kode_barang }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Batal</button>
                                                <form
                                                    action="{{ route('admin.barang-masuk.destroy', $data->no_barang_masuk) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
