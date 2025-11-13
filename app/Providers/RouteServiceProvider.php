<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Jalur home default setelah login
     */
    public const HOME = '/';

    /**
     * Daftarkan semua route aplikasi
     */
    public function boot(): void
    {
        $this->routes(function () {
            // 🔹 Route utama (user)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // 🔹 Route admin (pakai prefix /admin)
            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        });
    }
}
