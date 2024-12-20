<?php

namespace App\Http\Controllers\User;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data['title'] = 'Barang Masuk';
        $barang_masuks = DB::table('barang_masuks as bm')
            ->leftJoin('barangs as b', 'bm.kode_barang', '=', 'b.kode_barang')
            ->select('bm.*', 'b.nama_barang')
            ->get();

        return view('main.user.barang-masuk.index', compact('barang_masuks'), $data);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Data';
        // Mengambil layanan dari database
        $barang = Barang::orderBy('nama_barang', 'asc')->get();

        // Mendapatkan ID barang masuk terbaru dan membuat ID baru
        $lastTransaction = BarangMasuk::latest('no_barang_masuk')->first();
        $nomorUrut = $lastTransaction ? ((int) $lastTransaction->no_barang_masuk + 1) : 1;

        // Mengatur nomor urut sebagai id_transaksi
        $idTransaksi = $nomorUrut;

        return view('main.user.barang-masuk.create', compact('barang', 'idTransaksi'), $data);
    }


    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'qty' => 'required|integer|min:1',
            'asal' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Ambil data dari request
        $kode_barang = $request->input('kode_barang');
        $qty = $request->input('qty');
        $asal = $request->input('asal');
        $tanggal = $request->input('tanggal');

        // Cari barang berdasarkan kode_barang
        $barang = Barang::where('kode_barang', $kode_barang)->first();

        if (!$barang) {
            return redirect()->back()->withErrors('Barang tidak ditemukan.');
        }

        // Update stok barang
        $barang->stok += $qty;
        $barang->save();

        // Buat instance barang masuk dan simpan data
        $barangmasuk = new BarangMasuk();
        $barangmasuk->kode_barang = $kode_barang;
        $barangmasuk->qty = $qty;
        $barangmasuk->origin = $asal;
        $barangmasuk->tgl_masuk = $tanggal;

        if ($barangmasuk->save()) {
            // Redirect ke halaman barang masuk dengan pesan sukses
            return redirect()->route('user.barang-masuk.index')->with('pesan', 'Barang masuk berhasil ditambahkan dan stok diperbarui.');
        } else {
            return redirect()->back()->withErrors('Ada kesalahan saat menyimpan data.');
        }
    }



    public function destroy($id)
    {
        // Temukan data barang masuk berdasarkan ID
        $barangMasuk = BarangMasuk::findOrFail($id);

        // Cari barang berdasarkan kode_barang di tabel barang
        $barang = Barang::where('kode_barang', $barangMasuk->kode_barang)->first();

        if ($barang) {
            // Kurangi stok barang berdasarkan qty dari barang masuk
            $barang->stok -= $barangMasuk->qty;

            // Pastikan stok tidak menjadi negatif
            if ($barang->stok < 0) {
                $barang->stok = 0;
            }

            $barang->save();
        }

        // Hapus data barang masuk
        $barangMasuk->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('user.barang-masuk.index')->with('pesan', 'Data barang masuk berhasil dihapus dan stok diperbarui.');
    }
}
