<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $userRole = Auth::user()->role;

        // Mengubah roles menjadi array
        $rolesArray = explode('|', $roles);

        if (in_array($userRole, $rolesArray)) {
            // Jika peran pengguna sesuai, lanjutkan request
            return $next($request);
        }

        // Jika tidak sesuai, redirect atau tampilkan error
        if ($userRole == 'admin') {
            return redirect()->route('admin.index')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        } elseif ($userRole == 'user') {
            return redirect()->route('user.index')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        } elseif ($userRole == 'bank') {
            return redirect()->route('bank.index')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        } else {
            return redirect()->route('login')->with('error', 'Peran tidak dikenali.');
        }
    }
}
