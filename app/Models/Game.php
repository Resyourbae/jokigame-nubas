<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Game Model
 * 
 * Model untuk tabel games yang menyimpan data game joki.
 * Setiap game memiliki nama, deskripsi, harga per hari, foto, dan rank range.
 * 
 * Atribut:
 * - id: Primary key, auto increment
 * - name: Nama game (string, required)
 * - description: Deskripsi layanan joki (text, required)
 * - price: Harga per hari dalam Rupiah (integer, required)
 * - image: Nama file foto game (string, nullable)
 * - rank_from: Rank awal yang ditawarkan joki (string, nullable)
 * - rank_to: Rank target yang bisa dicapai (string, nullable)
 * - created_at: Waktu pembuatan record (timestamp)
 * - updated_at: Waktu pembaruan terakhir (timestamp)
 */
class Game extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'games';

    // Field-field yang bisa diisi secara mass assignment
    protected $fillable = [
        'name',          // Nama game
        'description',   // Deskripsi layanan joki
        'price',         // Harga per hari
        'image',         // Nama file foto game
        'rank_from',     // Rank awal yang ditawarkan
        'rank_to',       // Rank target tujuan
    ];

    /**
     * Relasi One-to-Many ke Order Model
     * 
     * Satu game bisa memiliki banyak order dari berbagai user.
     * Digunakan untuk mendapatkan semua order yang terkait dengan game tertentu.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
