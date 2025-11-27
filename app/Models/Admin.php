<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Admin Model
 * 
 * Model untuk tabel admins yang menyimpan data admin/pengelola sistem.
 * Admin memiliki akses khusus untuk mengelola game, galeri, dan order user.
 * Extends Authenticatable untuk mendukung fitur autentikasi Laravel.
 * 
 * Atribut:
 * - id: Primary key, auto increment
 * - username: Username admin (string, required, unique)
 * - password: Password admin, di-hash otomatis (string, required)
 * - created_at: Waktu pembuatan akun admin (timestamp)
 * - updated_at: Waktu pembaruan terakhir (timestamp)
 */
class Admin extends Authenticatable
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'admins';

    // Field-field yang bisa diisi secara mass assignment
    protected $fillable = [
        'username',  // Username admin (unique)
        'password',  // Password admin (di-hash otomatis)
    ];

    /**
     * Field-field yang harus disembunyikan saat serialisasi
     * Password tidak boleh terlihat di response API atau JSON
     * 
     * @var list<string>
     */
    protected $hidden = [
        'password',  // Password disembunyikan untuk keamanan
    ];
}
