<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function authenticationLogin(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // Ambil data pengguna berdasarkan username
        $user = User::where('email', $request->input('email'))->first();

        // Cek jika pengguna ditemukan
        if ($user) {
            // Jika password benar
            if (Hash::check($request->input('password'), $user->password)) {
                // Simpan id_user ke dalam session
                $request->session()->put('id_user', $user->id_user);
                $request->session()->put('id_role', $user->role);

                // Cek id_Role dan arahkan pengguna
                if ($user->role == 1) {
                    return redirect()->route('admin.dashboard')->with('success', 'Selamat datang di menu Admin'); // Ubah dengan route yang sesuai
                } elseif ($user->role == 2) {
                    return redirect()->route('user.dashboard')->with('success', 'Selamat datang di menu User');  // Ubah dengan route yang sesuai
                } else {
                    return redirect()->back()->withErrors(['error' => 'Role tidak dikenali']);
                }
            } else {
                // Jika password salah
                return redirect()->back()->withInput($request->all())->withErrors(['error' => 'Login Gagal']);
            }
        } else {
            // Jika pengguna tidak ditemukan
            return redirect()->back()->withInput($request->all())->withErrors(['error' => 'Akun tidak ditemukan']);
        }
    }

    public function logout(Request $request)
    {
        // Hapus id_user dan id_role dari session
        $request->session()->forget('id_user');
        $request->session()->forget('id_role');

        // Mengarahkan pengguna ke halaman login setelah logout
        return redirect('/login');
    }
}
