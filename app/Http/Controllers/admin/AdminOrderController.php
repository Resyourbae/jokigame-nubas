<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * AdminOrderController - Admin Order Management Controller
 * 
 * Mengatur pengelolaan order dari sisi admin termasuk melihat daftar order
 * dan mengubah status order. Admin dapat menerima, memproses, atau menolak order
 * dengan menambahkan catatan dan pesan status untuk user.
 * 
 * Order Status Types:
 * - menunggu: Order baru yang belum diproses
 * - diproses: Order sedang dikerjakan oleh joki
 * - diterima: Order sudah selesai dan diterima user
 * - ditolak: Order ditolak dengan alasan penolakan
 * - dibatalkan: Order dibatalkan oleh user (lihat OrderController untuk pembatalan)
 */
class AdminOrderController extends Controller
{
    /**
     * Menampilkan daftar semua order dengan kategori status
     * 
     * Menampilkan halaman order admin yang terbagi menjadi dua bagian:
     * 1. Pending Orders (status = 'menunggu'): Urut terbaru, tanpa limit
     *    - Order baru yang menunggu untuk diproses admin
     * 2. Processed Orders (status dalam 'diproses', 'diterima', 'ditolak'): 
     *    - Urut terbaru, limit 30 order
     *    - Order yang sudah ditangani admin
     * 
     * Setiap order include relasi user dan game untuk informasi lengkap.
     * 
     * @return \Illuminate\View\View View dari admin.orders.index dengan pending dan processed orders
     */
    public function index()
    {
        // Mengambil semua order yang menunggu diproses (status = 'menunggu')
        // Include relasi dengan user dan game untuk menampilkan info customer dan nama game
        $pendingOrders = Order::with(['user', 'game'])
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        // Mengambil order yang sudah diproses/ditangani (maksimal 30 order terakhir)
        // Termasuk order dalam status diproses, diterima, atau ditolak
        $processedOrders = Order::with(['user', 'game'])
            ->whereIn('status', ['diproses', 'diterima', 'ditolak'])
            ->latest()
            ->limit(30)
            ->get();

        return view('admin.orders.index', [
            'pendingOrders' => $pendingOrders,      // Order yang menunggu
            'processedOrders' => $processedOrders,  // Order yang sudah diproses
        ]);
    }

    /**
     * Mengubah status order dan menyimpan catatan/pesan dari admin
     * 
     * Admin dapat mengubah status order menjadi salah satu dari:
     * - diproses: Mulai mengerjakan order (joki siap mengerjakan)
     * - diterima: Order selesai (hasil kerja diterima user)
     * - ditolak: Tolak order dengan alasan wajib (admin_notes)
     * 
     * Fitur:
     * - Validasi status harus salah satu dari 3 pilihan
     * - admin_notes: Catatan admin (opsional, wajib jika ditolak, max 1000 karakter)
     * - status_message: Pesan custom untuk user (opsional, max 500 karakter)
     * - Jika tidak ada custom message, gunakan pesan default berdasarkan status
     * - Jika status ditolak namun tidak ada admin_notes, kembalikan error
     * 
     * Validasi:
     * - status: required, harus dalam: diproses, diterima, ditolak
     * - admin_notes: nullable, string, max 1000 karakter
     * - status_message: nullable, string, max 500 karakter
     * 
     * Default Messages (jika status_message kosong):
     * - diproses: "Pesanan Anda sedang kami proses. Terima kasih telah menunggu!"
     * - diterima: "Pesanan Anda sudah selesai diproses. Silakan lanjutkan instruksi selanjutnya."
     * - ditolak: "Pesanan Anda telah ditolak. Silakan lihat alasan penolakan di bawah ini."
     * 
     * @param Request $request Request dengan status, admin_notes, status_message
     * @param Order $order Order yang akan diupdate status-nya
     * @return \Illuminate\Http\RedirectResponse Redirect kembali dengan pesan sukses atau error
     */
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:diproses,diterima,ditolak',
            'admin_notes' => 'nullable|string|max:1000',
            'status_message' => 'nullable|string|max:500',
        ], [
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
            'admin_notes.max' => 'Catatan maksimal 1000 karakter',
            'status_message.max' => 'Pesan status maksimal 500 karakter',
        ]);

        // Update status order
        $order->status = $validated['status'];
        
        // Jika ditolak, admin_notes (alasan penolakan) wajib diisi
        if ($validated['status'] === 'ditolak' && empty($validated['admin_notes'] ?? null)) {
            return back()->withErrors(['admin_notes' => 'Alasan penolakan wajib diisi']);
        }

        // Simpan admin_notes jika ada
        if (!empty($validated['admin_notes'] ?? null)) {
            $order->admin_notes = $validated['admin_notes'];
        }

        // Simpan pesan status untuk user (custom atau default)
        if (!empty($validated['status_message'] ?? null)) {
            $order->status_message = $validated['status_message'];
        } else {
            // Gunakan pesan default berdasarkan status jika tidak ada custom message
            $defaultMessages = [
                'diproses' => 'Pesanan Anda sedang kami proses. Terima kasih telah menunggu!',
                'diterima' => 'Pesanan Anda sudah selesai diproses. Silakan lanjutkan instruksi selanjutnya.',
                'ditolak' => 'Pesanan Anda telah ditolak. Silakan lihat alasan penolakan di bawah ini.',
            ];
            $order->status_message = $defaultMessages[$validated['status']] ?? null;
        }

        // Simpan semua perubahan ke database
        $order->save();

        // Mapping untuk label status yang user-friendly
        $statusLabel = [
            'diproses' => 'Sedang Diproses',
            'diterima' => 'Diterima/Selesai',
            'ditolak' => 'Ditolak',
        ];

        return back()->with('success', "Status pesanan #" . str_pad($order->id, 5, '0', STR_PAD_LEFT) . " berhasil diubah menjadi {$statusLabel[$validated['status']]}");
    }
}

