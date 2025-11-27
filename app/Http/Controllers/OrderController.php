<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * OrderController - User Order Management Controller
 * 
 * Mengatur manajemen order dari sisi user/customer termasuk membuat order,
 * melihat daftar order, dan membatalkan order.
 * User harus login untuk membuat order.
 * Setiap order terdiri dari: game, tanggal mulai, tanggal selesai, durasi, dan harga.
 * Harga dihitung otomatis berdasarkan durasi × harga game per hari.
 * 
 * Order dapat dibatalkan hanya jika status masih 'menunggu' atau 'diproses'.
 */
class OrderController extends Controller
{
    /**
     * Membuat order baru untuk user
     * 
     * User memilih game, tanggal mulai, dan tanggal selesai untuk membuat order.
     * Durasi dihitung otomatis dari selisih tanggal (termasuk hari pertama).
     * Harga dihitung sebagai: durasi × harga game per hari.
     * Order dibuat dengan status 'menunggu' untuk menunggu proses admin.
     * 
     * Validasi:
     * - game_id: required, harus ada di tabel games
     * - start_date: required, date, tidak boleh sebelum hari ini
     * - end_date: required, date, harus sama atau setelah start_date
     * 
     * Proses:
     * 1. Cek apakah user sudah login (harus login untuk membuat order)
     * 2. Validasi input dari request
     * 3. Ambil data game dari database
     * 4. Hitung durasi dari start_date ke end_date (+1 hari untuk include tanggal mulai)
     * 5. Hitung total harga = durasi × game->price
     * 6. Simpan order dengan status 'menunggu'
     * 7. Redirect ke halaman orders dengan pesan sukses
     * 
     * @param Request $request Request dengan game_id, start_date, end_date
     * @return \Illuminate\Http\Response JSON response jika tidak login, atau redirect ke orders.index
     */
    public function store(Request $request)
    {
        // Cek apakah user sudah login
        // Jika belum, return error 401 Unauthorized
        if (!Auth::check()) {
            return response()->json(['error' => 'Anda harus login untuk membuat pesanan'], 401);
        }

        // Validasi input dari form
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'game_id.required' => 'Game harus dipilih',
            'game_id.exists' => 'Game tidak ditemukan',
            'start_date.required' => 'Tanggal mulai harus diisi',
            'start_date.after_or_equal' => 'Tanggal mulai tidak boleh sebelum hari ini',
            'end_date.required' => 'Tanggal selesai harus diisi',
            'end_date.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai',
        ]);

        // Ambil data game dari database
        $game = Game::findOrFail($validated['game_id']);

        // Hitung durasi dalam hari
        // +1 untuk include tanggal mulai (misal: 01 Jan - 03 Jan = 3 hari)
        $startDate = new \DateTime($validated['start_date']);
        $endDate = new \DateTime($validated['end_date']);
        $interval = $startDate->diff($endDate);
        $durationDays = $interval->days + 1;

        // Hitung total harga: durasi × harga per hari
        $price = $durationDays * $game->price;

        // Buat order baru di database
        $order = Order::create([
            'user_id' => Auth::id(),           // ID user yang login
            'game_id' => $validated['game_id'], // Game yang dipesan
            'start_date' => $validated['start_date'],    // Tanggal mulai
            'end_date' => $validated['end_date'],        // Tanggal selesai
            'duration_days' => $durationDays,  // Durasi hitung
            'price' => $price,                 // Total harga
            'status' => 'menunggu',            // Status awal menunggu admin
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat! Admin akan segera memproses pesanan Anda.');
    }

    /**
     * Menampilkan daftar order user
     * 
     * Menampilkan semua order yang dibuat oleh user yang sedang login.
     * Order ditampilkan dengan pagination yang dapat dikustomisasi melalui parameter limit.
     * User dapat memilih menampilkan 3, 5, 10, 30, 50, atau semua order sekaligus.
     * 
     * Data yang dikirim:
     * - orders: List order user sesuai limit
     * - currentLimit: Limit yang sedang digunakan
     * - totalOrders: Total jumlah order user (untuk info di view)
     * 
     * Valid Limits: 3, 5, 10, 30, 50, 'all'
     * Default limit: 10 (jika tidak ada parameter atau invalid)
     * 
     * Urut: Terbaru (latest) - order terbaru tampil pertama
     * Include relasi: game - untuk menampilkan nama game di view
     * 
     * @param Request $request Request parameter 'limit' untuk mengatur jumlah data
     * @return \Illuminate\View\View View dari orders.index dengan orders, currentLimit, totalOrders
     */
    public function index(Request $request)
    {
        // Ambil parameter limit dari request, default 10 jika tidak ada
        $limit = $request->get('limit', 10);
        
        // Validasi limit hanya boleh nilai-nilai yang ditentukan
        $validLimits = [3, 5, 10, 30, 50, 'all'];
        if (!in_array($limit, $validLimits)) {
            $limit = 10;
        }

        // Query order user yang sedang login, include relasi game, urut terbaru
        $query = Auth::user()->orders()->with('game')->latest();
        
        // Terapkan limit jika tidak 'all'
        if ($limit !== 'all') {
            $orders = $query->limit($limit)->get();
        } else {
            // Jika 'all', ambil semua order tanpa limit
            $orders = $query->get();
        }

        return view('orders.index', [
            'orders' => $orders,                        // Order user yang ditampilkan
            'currentLimit' => $limit,                   // Limit yang sedang digunakan
            'totalOrders' => Auth::user()->orders()->count(), // Total order untuk info
        ]);
    }

    /**
     * Membatalkan order user
     * 
     * User hanya dapat membatalkan order yang masih dalam status 'menunggu' atau 'diproses'.
     * Order dengan status 'diterima', 'ditolak', atau sudah 'dibatalkan' tidak dapat dibatalkan lagi.
     * 
     * Keamanan:
     * - Cek apakah user adalah pemilik order (user_id harus sama dengan Auth::id())
     * - Return 403 Forbidden jika bukan pemilik
     * 
     * Proses Pembatalan:
     * 1. Cek owner: memastikan hanya pemilik order yang bisa membatalkan
     * 2. Cek status: hanya status 'menunggu' atau 'diproses' yang bisa dibatalkan
     * 3. Update order: ubah status menjadi 'dibatalkan' dan set cancelled_at = now()
     * 4. Return: redirect dengan pesan sukses atau error
     * 
     * @param Order $order Order yang akan dibatalkan (route model binding)
     * @return \Illuminate\Http\RedirectResponse Redirect dengan pesan sukses atau error
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException 403 jika bukan pemilik
     */
    public function cancel(Order $order)
    {
        // Cek apakah user adalah pemilik order
        // Jika tidak, kembalikan 403 Forbidden
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Cek apakah order dapat dibatalkan (hanya status menunggu atau diproses)
        // Order dengan status lain (diterima, ditolak, dibatalkan) tidak bisa dibatalkan
        if (!in_array($order->status, ['menunggu', 'diproses'])) {
            return back()->withErrors(['error' => 'Pesanan dengan status ini tidak dapat dibatalkan']);
        }

        // Update order: ubah status menjadi dibatalkan dan catat waktu pembatalan
        $order->update([
            'status' => 'dibatalkan',
            'cancelled_at' => now(),
        ]);

        return back()->with('success', 'Pesanan berhasil dibatalkan');
    }
}
