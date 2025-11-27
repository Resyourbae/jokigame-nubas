<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Mengimpor model Game dari folder Models
use App\Models\Game;
// Mengimpor model Gallery dari folder Models
use App\Models\Gallery;

/**
 * UserController - User/Public Pages Controller
 * 
 * Mengatur halaman publik yang bisa diakses oleh semua user (tidak perlu login).
 * Menampilkan daftar game joki, galeri/portfolio, dan detail masing-masing game.
 * User dapat melihat informasi game, harga, dan membuat order dari controller ini.
 */
class UserController extends Controller
{
    /**
     * Menampilkan halaman utama (home) user
     * 
     * Menampilkan halaman beranda dengan daftar semua game joki dan galeri portfolio.
     * Mengambil semua data game dan gallery dari database untuk ditampilkan.
     * 
     * Data yang dikirim ke view:
     * - games: Koleksi semua game dengan atribut (id, name, description, price, image, rank_from, rank_to)
     * - galleries: Koleksi semua gallery dengan atribut (id, title, image_path, description)
     * 
     * @return \Illuminate\View\View View dari user.home dengan games dan galleries
     */
    public function index(){
        // Mengambil semua data game dari database
        $games = Game::all();
        // Mengambil semua data gallery dari database
        $galleries = Gallery::all();
        // Mengembalikan view user.home dengan data games dan galleries
        return view('user.home', compact('games', 'galleries'));
    }

    /**
     * Menampilkan halaman detail game
     * 
     * Menampilkan informasi lengkap tentang satu game joki.
     * Halaman ini menampilkan deskripsi game, harga, range rank, dan image.
     * User dapat melihat detail dan membuat order dari halaman ini.
     * 
     * Route Model Binding: Game $game secara otomatis mengambil game berdasarkan ID dari URL.
     * Jika game tidak ditemukan, Laravel akan mengembalikan 404 Not Found.
     * 
     * @param Game $game Game yang dipilih dari URL (route model binding)
     * @return \Illuminate\View\View View dari games.detail dengan data game
     */
    public function gameDetail(Game $game)
    {
        // Return game detail view dengan data game
        return view('games.detail', compact('game'));
    }
}

