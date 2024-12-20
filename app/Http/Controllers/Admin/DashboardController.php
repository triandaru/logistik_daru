<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        // Mengambil data barang masuk
        $barangMasuk = Barang::leftJoin('barang_masuks', 'barangs.kode_barang', '=', 'barang_masuks.kode_barang')
            ->selectRaw('barangs.nama_barang, SUM(barang_masuks.qty) as total_qty')
            ->groupBy('barangs.kode_barang', 'barangs.nama_barang')
            ->get();

        // Mengambil data barang keluar
        $barangKeluar = Barang::leftJoin('barang_keluars', 'barangs.kode_barang', '=', 'barang_keluars.kode_barang')
            ->selectRaw('barangs.nama_barang, COUNT(barang_keluars.no_barang_keluar) as jumlah')
            ->groupBy('barangs.kode_barang', 'barangs.nama_barang')
            ->get();

        // Ekstrak data untuk grafik
        $namaBarang = $barangMasuk->pluck('nama_barang')->toArray(); // Nama barang
        $jumlahBarangMasuk = $barangMasuk->pluck('total_qty')->toArray(); // Total barang masuk
        $jumlahBarangKeluar = $barangKeluar->pluck('jumlah')->toArray(); // Jumlah transaksi barang keluar

        // Return ke view dengan data yang diproses
        return view('main.admin.dashboard', compact('namaBarang', 'jumlahBarangMasuk', 'jumlahBarangKeluar'), $data);
    }
}
