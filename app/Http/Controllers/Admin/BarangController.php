<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('main.admin.barang.index', [
            "barangs" => $barangs,
            'title' => 'Barang' // atau teks lain yang sesuai
        ]);
    }

    public function create()
    {
        return view('main.admin.barang.create', [
            'title' => 'Tambah Data',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'barang' => 'required|string|max:255',
            'stok' => 'required|string|max:255', // Validasi sebagai string karena ada pemrosesan khusus untuk biaya
        ]);

        // Ambil data dari request dan proses biaya
        $nama_barang = $request->input('barang');
        $stok = $request->input('stok');


        // Buat instance barang dan simpan data
        $barang = new Barang();
        $barang->nama_barang = $nama_barang;
        $barang->stok = $stok;

        // Simpan ke database
        if ($barang->save()) {
            // Redirect ke halaman barang dengan pesan sukses
            return redirect()->route('admin.barang.index')->with('pesan', 'Data berhasil disimpan.');
        } else {
            // Redirect kembali dengan pesan error jika gagal menyimpan
            return redirect()->back()->withErrors('Ada kesalahan saat menyimpan data.');
        }
    }
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('main.admin.barang.edit', [
            'barang' => $barang,
            'title' => 'Laman Edit'
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'barang' => 'required|string|max:255',
            'stok' => 'required|string', // Sesuaikan validasi jika perlu
        ]);

        // Cari data barang berdasarkan id
        $barang = Barang::findOrFail($id);

        // Update data barang
        $barang->nama_barang = $request->input('barang'); // Gunakan 'nama_barang' sesuai dengan field di database
        $barang->stok = $request->input('stok'); // Hilangkan titik untuk biaya

        // Simpan perubahan ke database
        $barang->save();

        // Redirect ke halaman barang dengan pesan sukses
        return redirect()->route('admin.barang.index')->with('pesan', 'Data berhasil diubah.');
    }

    // Destroy method
    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('admin.barang.index')->with('pesan', 'Kategori berhasil dihapus.');
    }
}
