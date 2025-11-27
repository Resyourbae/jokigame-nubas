<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Order Model
 * 
 * Model untuk tabel orders yang menyimpan data pesanan joki dari user.
 * Setiap order berisi informasi tentang user, game yang dipesan, tanggal, durasi, dan status.
 * 
 * Status yang tersedia:
 * - menunggu: Order baru, menunggu persetujuan admin
 * - diproses: Admin sedang mengerjakan order
 * - diterima: Order selesai dan diterima user
 * - ditolak: Order ditolak oleh admin
 * - dibatalkan: Order dibatalkan oleh user
 * 
 * Atribut:
 * - id: Primary key, auto increment
 * - user_id: Foreign key ke users table
 * - game_id: Foreign key ke games table
 * - start_date: Tanggal mulai order (date)
 * - end_date: Tanggal selesai order (date)
 * - duration_days: Jumlah hari durasi order (integer)
 * - price: Total harga order (decimal)
 * - status: Status order (string)
 * - admin_notes: Catatan admin jika order ditolak (text, nullable)
 * - status_message: Pesan update status dari admin (text, nullable)
 * - cancelled_at: Waktu pembatalan order (timestamp, nullable)
 * - created_at: Waktu pembuatan order (timestamp)
 * - updated_at: Waktu pembaruan terakhir (timestamp)
 */
class Order extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'orders';

    // Field-field yang bisa diisi secara mass assignment
    protected $fillable = [
        'user_id',              // ID user yang membuat order
        'game_id',              // ID game yang dipesan
        'start_date',           // Tanggal mulai joki
        'end_date',             // Tanggal selesai joki
        'duration_days',        // Jumlah hari durasi
        'price',                // Total harga order
        'status',               // Status order (menunggu, diproses, diterima, ditolak, dibatalkan)
        'admin_notes',          // Catatan admin (jika ditolak)
        'status_message',       // Pesan update status dari admin
        'cancelled_at',         // Waktu pembatalan order
    ];

    // Type casting untuk field tertentu
    protected $casts = [
        'start_date' => 'date',      // Cast start_date ke Carbon date instance
        'end_date' => 'date',        // Cast end_date ke Carbon date instance
        'price' => 'decimal:2',      // Cast price ke decimal dengan 2 digit belakang koma
        'cancelled_at' => 'datetime', // Cast cancelled_at ke Carbon datetime instance
    ];

    /**
     * Relasi Many-to-One ke User Model
     * 
     * Setiap order milik satu user, banyak order bisa milik satu user.
     * Digunakan untuk mendapatkan data user yang membuat order.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi Many-to-One ke Game Model
     * 
     * Setiap order adalah pesanan satu game, banyak order bisa untuk satu game.
     * Digunakan untuk mendapatkan data game yang dipesan.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
