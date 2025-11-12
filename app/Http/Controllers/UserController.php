<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Mengimpor model Game dari folder Models
use App\Models\Game;
// Mengimpor model Gallery dari folder Models
use App\Models\Gallery;

class UserController extends Controller
{
    public function index(){
        // Mengambil semua data game dari database
        $games = Game::all();
        // Mengambil semua data gallery dari database
        $galleries = Gallery::all();
        // Mengembalikan view user.home dengan data games dan galleries
        return view('user.home', compact('games', 'galleries'));
    }
}
