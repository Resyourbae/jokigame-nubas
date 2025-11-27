<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Gallery Model
 * 
 * Model untuk tabel galleries yang menyimpan data galeri/portfolio screenshot.
 * Galeri digunakan untuk menampilkan bukti/testimoni kesuksesan joki di halaman utama.
 * 
 * Atribut:
 * - id: Primary key, auto increment
 * - title: Judul/nama galeri (string, required)
 * - image_path: Path/lokasi file foto galeri (string, required)
 * - description: Deskripsi galeri (text, nullable)
 * - created_at: Waktu pembuatan record (timestamp)
 * - updated_at: Waktu pembaruan terakhir (timestamp)
 */
class Gallery extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'galleries';

    // Field-field yang bisa diisi secara mass assignment
    protected $fillable = [
        'title',        // Judul/nama galeri
        'image_path',   // Path file foto galeri (contoh: uploads/galleries/filename.jpg)
        'description',  // Deskripsi galeri
    ];
}
