<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;

class ManajemenUserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // return view('main.admin.user.index', [
        //     "users" => $users,
        //     'title' => 'Manajemen User' // atau teks lain yang sesuai
        // ]);

        $data['title'] = 'Manajemen User';
        $users = DB::table('users as us')
            ->leftJoin('roles as r', 'us.role', '=', 'r.id_role') // Benarkan join antara role (users) dan id_role (roles)
            ->select('us.*', 'r.nama_role') // Gunakan alias tabel yang benar
            ->get();

        // Pastikan data dikompak dengan benar
        return view('main.admin.user.index', compact('users'), $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data';
        $data['roles'] = Role::orderBy('nama_role', 'asc')->get(); // Tambahkan roles ke dalam $data

        return view('main.admin.user.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,id_role',
        ]);

        // Simpan data ke database
        User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Enkripsi password
            'role' => $validatedData['role'],
        ]);

        // Redirect atau beri pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'Data user berhasil disimpan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Tambahkan roles ke dalam array data
        $data = [
            'title' => 'Laman Edit',
            'user' => $user,
            'roles' => Role::orderBy('nama_role', 'asc')->get()
        ];

        return view('main.admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id . ',id_user', // Email harus unik kecuali milik user saat ini
            'password' => 'nullable|string|min:8', // Password boleh kosong jika tidak diubah
            'role' => 'required|exists:roles,id_role',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];

        // Update password hanya jika diisi
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Simpan perubahan
        $user->save();

        // Redirect atau beri pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index')->with('pesan', 'Kategori berhasil dihapus.');
    }
}
