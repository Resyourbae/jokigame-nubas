<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckNotAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Jika ada session admin_id, redirect ke admin dashboard
        if (session('admin_id')) {
            return redirect()->route('admin.dashboard')->with('error', 'Anda harus logout dari akun admin terlebih dahulu');
        }

        return $next($request);
    }
}
