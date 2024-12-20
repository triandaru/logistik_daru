@extends('layout.navbar')

@section('content')
    <div class="container-fluid">
        <h1 class="h4 mb-4 text-gray-800"><i class="fas fa-clipboard-list fa-fw mr-2"></i>Barang Masuk</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Entri Data Barang Masuk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.barang-masuk.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Barang <span class="text-danger">*</span></label>
                                <select id="barang" name="kode_barang" class="form-control" autocomplete="off" required>
                                    <option selected disabled value="">-- Pilih --</option>
                                    @foreach ($barang as $data)
                                        <option value="{{ $data->kode_barang }}" data-stok="{{ $data->stok }}">
                                            {{ $data->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">Barang tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-md-5 ml-auto">
                            <div class="form-group">
                                <label>Tanggal <span class="text-danger">*</span></label>
                                <input type="text" name="tanggal" class="form-control date-picker"
                                    data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ now()->format('Y-m-d') }}"
                                    required>
                                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-3 mb-4">

                    <div class="row">
                        <div class="col-md-7">

                            <div class="form-group">
                                <label>Asal Barang <span class="text-danger">*</span></label>
                                <input type="text" name="asal" class="form-control text-uppercase" autocomplete="off"
                                    required>
                                <div class="invalid-feedback">Data tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-md-5 ml-auto">
                            <div class="form-group">
                                <label>Qty <span class="text-danger">*</span></label>
                                <input type="text" name="qty" class="form-control text-uppercase" autocomplete="off"
                                    required>
                                <div class="invalid-feedback">QTY tidak boleh kosong.</div>
                            </div>
                        </div>

                    </div>

                    <hr class="mt-3 mb-4">

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Stok <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="data_stok" name="stok" class="form-control" readonly>
                                    <div id="data_satuan" class="input-group-append"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 ml-auto">
                            <div class="form-group">
                                <label>Total Stok <span class="text-danger">*</span></label>
                                <input type="text" id="total" name="total" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-5">

                    <div class="form-group pt-3">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-info pl-4 pr-4 mr-2">
                        <a href="{{ route('admin.barang-masuk.index') }}" class="btn btn-secondary pl-4 pr-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const barangSelect = document.getElementById('barang');
            const stokInput = document.getElementById('data_stok');
            const qtyInput = document.querySelector('input[name="qty"]');
            const totalInput = document.getElementById('total');

            // Ketika barang dipilih, update stok
            barangSelect.addEventListener('change', function() {
                // Ambil opsi yang dipilih
                const selectedOption = barangSelect.options[barangSelect.selectedIndex];

                // Ambil data stok dari opsi yang dipilih
                const stok = parseFloat(selectedOption.getAttribute('data-stok')) || 0;

                // Update input stok
                stokInput.value = stok;

                // Perbarui total stok jika qty sudah terisi
                updateTotal();
            });

            // Ketika qty diisi, update total
            qtyInput.addEventListener('input', function() {
                updateTotal();
            });

            function updateTotal() {
                const stok = parseFloat(stokInput.value) || 0; // Pastikan stok adalah angka
                const qty = parseFloat(qtyInput.value) || 0; // Pastikan qty adalah angka
                totalInput.value = stok + qty; // Total adalah stok + qty
            }
        });
    </script>
@endsection
