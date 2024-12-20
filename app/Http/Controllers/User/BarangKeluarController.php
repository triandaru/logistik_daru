<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Http\Controllers\Controller;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data['title'] = 'Barang Keluar';
        $barang_keluars = DB::table('barang_keluars as bk')
            ->leftJoin('barangs as b', 'bk.kode_barang', '=', 'b.kode_barang')
            ->select('bk.*', 'b.nama_barang')
            ->get();

        return view('main.user.barang-keluar.index', compact('barang_keluars'), $data);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data';
        // Mengambil layanan dari database
        $barang = Barang::orderBy('nama_barang', 'asc')->get();

        // Mendapatkan ID barang masuk terbaru dan membuat ID baru
        $lastTransaction = BarangKeluar::latest('no_barang_keluar')->first();
        $nomorUrut = $lastTransaction ? ((int) $lastTransaction->no_barang_keluar + 1) : 1;

        // Mengatur nomor urut sebagai id_transaksi
        $idTransaksi = $nomorUrut;

        return view('main.user.barang-keluar.create', compact('barang', 'idTransaksi'), $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'qty' => 'required|integer|min:1',
            'destination' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Ambil data dari request
        $kode_barang = $request->input('kode_barang');
        $qty = $request->input('qty');
        $destination = $request->input('destination');
        $tanggal = $request->input('tanggal');

        // Cari barang berdasarkan kode_barang
        $barang = Barang::where('kode_barang', $kode_barang)->first();

        if (!$barang) {
            return redirect()->back()->withErrors('Barang tidak ditemukan.');
        }

        // Pastikan stok mencukupi untuk barang keluar
        if ($barang->stok < $qty) {
            return redirect()->back()->withErrors('Stok barang tidak mencukupi untuk barang keluar.');
        }

        // Kurangi stok barang
        $barang->stok -= $qty;
        $barang->save();

        // Buat instance barang keluar dan simpan data
        $barangKeluar = new BarangKeluar();
        $barangKeluar->kode_barang = $kode_barang;
        $barangKeluar->qty = $qty;
        $barangKeluar->destination = $destination;
        $barangKeluar->tgl_keluar = $tanggal;

        if ($barangKeluar->save()) {
            // Redirect ke halaman barang keluar dengan pesan sukses
            return redirect()->route('user.barang-keluar.index')->with('pesan', 'Barang keluar berhasil ditambahkan dan stok diperbarui.');
        } else {
            return redirect()->back()->withErrors('Ada kesalahan saat menyimpan data.');
        }
    }

    public function destroy($id)
    {
        // Temukan data barang keluar berdasarkan ID
        $barangKeluar = BarangKeluar::findOrFail($id);

        // Cari barang berdasarkan kode_barang di tabel barang
        $barang = Barang::where('kode_barang', $barangKeluar->kode_barang)->first();

        if ($barang) {
            // Tambahkan stok barang berdasarkan qty dari barang keluar
            $barang->stok += $barangKeluar->qty;

            // Simpan perubahan stok
            $barang->save();
        }

        // Hapus data barang keluar
        $barangKeluar->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('user.barang-keluar.index')->with('pesan', 'Data barang keluar berhasil dihapus dan stok diperbarui.');
    }
}
