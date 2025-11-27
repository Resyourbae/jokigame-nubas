<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User Model
 * 
 * Model untuk tabel users yang menyimpan data user/pembeli joki game.
 * User adalah pelanggan yang dapat membuat order/pesanan untuk layanan joki.
 * Extends Authenticatable untuk mendukung fitur autentikasi Laravel.
 * 
 * Atribut:
 * - id: Primary key, auto increment
 * - name: Nama lengkap user (string, required)
 * - email: Email user, harus unik (string, required, unique)
 * - password: Password user, di-hash otomatis (string, required)
 * - email_verified_at: Waktu verifikasi email (timestamp, nullable)
 * - remember_token: Token untuk fitur "remember me" (string, nullable)
 * - created_at: Waktu pendaftaran user (timestamp)
 * - updated_at: Waktu pembaruan terakhir (timestamp)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field-field yang bisa diisi secara mass assignment (untuk proteksi bulk assignment)
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nama user
        'email',     // Email user (unique)
        'password',  // Password (di-hash otomatis saat disimpan)
    ];

    /**
     * Field-field yang harus disembunyikan saat serialisasi (misal saat convert ke JSON)
     * Ini untuk keamanan, password dan token tidak boleh terlihat
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',        // Password disembunyikan
        'remember_token',  // Token remember me disembunyikan
    ];

    /**
     * Type casting untuk field tertentu
     * 
     * Menentukan tipe data untuk field saat mengambil/menyimpan dari database.
     * Password otomatis di-hash menggunakan bcrypt saat disimpan.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // Cast ke Carbon datetime instance
            'password' => 'hashed',             // Password auto-hashed saat disimpan
        ];
    }

    /**
     * Relasi One-to-Many ke Order Model
     * 
     * Satu user bisa membuat banyak order.
     * Digunakan untuk mendapatkan semua order yang dibuat oleh user tertentu.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
