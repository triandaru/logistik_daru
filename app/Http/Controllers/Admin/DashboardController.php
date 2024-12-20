<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $data['title'] = 'Dashboard';
    //     // Mengambil data barang masuk
    //     $barangMasuk = Barang::leftJoin('barang_masuks', 'barangs.kode_barang', '=', 'barang_masuks.kode_barang')
    //         ->selectRaw('barangs.nama_barang, SUM(barang_masuks.qty) as total_qty')
    //         ->groupBy('barangs.kode_barang', 'barangs.nama_barang')
    //         ->get();

    //     // Mengambil data barang keluar
    //     $barangKeluar = Barang::leftJoin('barang_keluars', 'barangs.kode_barang', '=', 'barang_keluars.kode_barang')
    //         ->selectRaw('barangs.nama_barang, COUNT(barang_keluars.no_barang_keluar) as jumlah')
    //         ->groupBy('barangs.kode_barang', 'barangs.nama_barang')
    //         ->get();

    //     // Ekstrak data untuk grafik
    //     $namaBarang = $barangMasuk->pluck('nama_barang')->toArray(); // Nama barang
    //     $jumlahBarangMasuk = $barangMasuk->pluck('total_qty')->toArray(); // Total barang masuk
    //     $jumlahBarangKeluar = $barangKeluar->pluck('jumlah')->toArray(); // Jumlah transaksi barang keluar

    //     // Return ke view dengan data yang diproses
    //     return view('main.admin.dashboard', compact('namaBarang', 'jumlahBarangMasuk', 'jumlahBarangKeluar'), $data);
    // }

    public function index()
    {
        $data['title'] = 'Dashboard';

        // Mengambil total qty barang masuk
        $totalBarangMasuk = Barang::leftJoin('barang_masuks', 'barangs.kode_barang', '=', 'barang_masuks.kode_barang')
            ->selectRaw('SUM(barang_masuks.qty) as total_qty')
            ->first();

        // Mengambil total qty barang keluar
        $totalBarangKeluar = Barang::leftJoin('barang_keluars', 'barangs.kode_barang', '=', 'barang_keluars.kode_barang')
            ->selectRaw('SUM(barang_keluars.qty) as total_qty')
            ->first();

        // Mengambil data barang masuk dan keluar
        $barangMasuk = Barang::leftJoin('barang_masuks', 'barangs.kode_barang', '=', 'barang_masuks.kode_barang')
            ->selectRaw('barangs.nama_barang, COUNT(barang_masuks.no_barang_masuk) as jumlah')
            ->groupBy('barangs.kode_barang', 'barangs.nama_barang')
            ->get();

        $barangKeluar = Barang::leftJoin('barang_keluars', 'barangs.kode_barang', '=', 'barang_keluars.kode_barang')
            ->selectRaw('barangs.nama_barang, COUNT(barang_keluars.no_barang_keluar) as jumlah')
            ->groupBy('barangs.kode_barang', 'barangs.nama_barang')
            ->get();

        // Ekstrak data untuk grafik
        $totalBarangMasukQty = $totalBarangMasuk->total_qty ?? 0; // Total barang masuk
        $totalBarangKeluarQty = $totalBarangKeluar->total_qty ?? 0; // Total barang keluar

        $jumlahBarangMasuk = $barangMasuk->pluck('jumlah')->toArray(); // Jumlah barang masuk per barang
        $jumlahBarangKeluar = $barangKeluar->pluck('jumlah')->toArray(); // Jumlah barang keluar per barang

        // Return ke view dengan data yang diproses
        return view('main.admin.dashboard', compact('totalBarangMasukQty', 'totalBarangKeluarQty', 'jumlahBarangMasuk', 'jumlahBarangKeluar'), $data);
    }
}
