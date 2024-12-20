<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Cek apakah user sudah login dengan memeriksa session
        if (!$request->session()->has('id_role')) {
            return redirect('/login')->withErrors('Anda harus login terlebih dahulu.');
        }

        $id_role = $request->session()->get('id_role');

        // Cek role berdasarkan session
        if ($id_role == 1) {
            if ($role == 'admin' && $id_role != 1) {
                return redirect('/user/dashboard')->withErrors('Anda tidak memiliki hak akses sebagai admin.');
            }
        }

        if ($id_role == 2) {
            if ($role == 'user' && $id_role != 2) {
                return redirect('/admin/dashboard')->withErrors('Anda tidak memiliki hak akses sebagai user.');
            }
        }

        return $next($request);
    }
}
