@extends('layout.navbar')

@section('content')
    <div class="container-fluid">
        @php
            use App\Models\User;
            $user = User::with('role')->where('id_user', session('id_user'))->first();
        @endphp
        <!-- judul halaman -->
        <h1 class="h4 mb-4 text-gray-800"><i class="fas fa-fw fa-tachometer-alt mr-2"></i>Dashboard</h1>

        <!-- menampilkan pesan selamat datang -->
        <div class="alert alert-warning alert-dismissible fade show py-3 mb-4" role="alert">
            <i class="fas fa-user mr-2"></i>Selamat datang kembali <strong>{{ $user->nama }}</strong> di Aplikasi Logistik
            Makanan. Anda login sebagai <strong>User</strong>.
        </div>

        <div class="row">
            <!-- menampilkan informasi jumlah data layanan -->
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-info mb-2">Data Barang</div>
                                @php
                                    $jumlah_Barang = \App\Models\Barang::count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_Barang }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clone fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menampilkan informasi jumlah data transaksi -->
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-warning mb-2">Barang Masuk</div>
                                @php
                                    $jumlah_barang_masuk = \App\Models\BarangMasuk::count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_barang_masuk }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menampilkan informasi jumlah total pendapatan -->
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-success mb-2">Barang Keluar</div>
                                @php
                                    $jumlah_barang_keluar = \App\Models\BarangKeluar::count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_barang_keluar }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menampilkan informasi jumlah data pengguna aplikasi -->
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary mb-2">Pengguna Aplikasi</div>
                                @php
                                    $jumlah_user = \App\Models\User::count();
                                @endphp
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_user }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- grafik total pendapatan per layanan -->
            <div class="col-lg-6 col-md-12 mt-3 mb-5">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <!-- judul grafik -->
                        <h6 class="m-0 font-weight-bold">Jumlah Transaksi Per Barang masuk dan keluar</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <!-- menampilkan grafik -->
                            <canvas id="grafikBarangMasukKeluar"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- grafik jumlah transaksi per layanan -->
            <div class="col-lg-6 col-md-12 mt-3 mb-5">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <!-- judul grafik -->
                        <h6 class="m-0 font-weight-bold">Jumlah Stok Barang Keluar dan keluar</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <!-- menampilkan grafik -->
                            <canvas id="grafikBarangMasukKeluarPie"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= url('https://cdn.jsdelivr.net/npm/chart.js') ?>"></script>
    <script>
        var totalBarangMasukQty = @json($totalBarangMasukQty);
        var totalBarangKeluarQty = @json($totalBarangKeluarQty);

        // Grafik Barang Masuk dan Barang Keluar (Bar Chart)
        var ctx = document.getElementById("grafikBarangMasukKeluar");
        var grafikBarangMasukKeluar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Barang Masuk', 'Barang Keluar'],
                datasets: [{
                    label: "Total Qty",
                    backgroundColor: ['#36b9cc', '#e74a3b'],
                    hoverBackgroundColor: ['#2c9faf', '#e02d1b'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    data: [totalBarangMasukQty, totalBarangKeluarQty],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        maxBarThickness: 70,
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 10
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' : ' + tooltipItem.yLabel + ' Qty';
                        }
                    }
                },
            }
        });

        // Grafik Barang Masuk dan Barang Keluar (Pie Chart)
        var ctxPie = document.getElementById("grafikBarangMasukKeluarPie");
        var grafikBarangMasukKeluarPie = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Barang Masuk', 'Barang Keluar'],
                datasets: [{
                    data: [totalBarangMasukQty, totalBarangKeluarQty],
                    backgroundColor: ['#36b9cc', '#e74a3b'],
                    hoverBackgroundColor: ['#2c9faf', '#e02d1b'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    position: 'top',
                    display: true,
                },
            }
        });
    </script>
@endsection
