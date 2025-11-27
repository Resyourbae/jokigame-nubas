<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Gallery;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * DashboardController
 * 
 * Controller untuk mengelola dashboard admin.
 * Menampilkan statistik umum seperti total game, galeri, dan order.
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard dengan statistik keseluruhan
     * 
     * Fungsi ini mengambil:
     * - Total jumlah game yang tersedia
     * - Total jumlah galeri yang ada
     * - Total jumlah order dari semua user
     * 
     * @return \Illuminate\View\View - Menampilkan view admin.dashboard dengan data statistik
     */
    public function index()
    {
        // Hitung total jumlah game dari database
        $totalGames = Game::count();
        
        // Hitung total jumlah galeri dari database
        $totalGalleries = Gallery::count();
        
        // Hitung total jumlah order dari database
        $totalOrders = Order::count();

        // Kembalikan view dashboard dengan data statistik
        return view('admin.dashboard', compact('totalGames', 'totalGalleries', 'totalOrders'));
    }
}
