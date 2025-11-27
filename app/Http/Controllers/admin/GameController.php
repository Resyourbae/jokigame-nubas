<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

/**
 * GameController
 * 
 * Controller untuk mengelola data game.
 * Menangani CRUD (Create, Read, Update, Delete) untuk game joki.
 */
class GameController extends Controller
{
    /**
     * Menampilkan daftar semua game dengan pagination
     * 
     * Fungsi ini mengambil semua data game dari database dengan pagination 10 item per halaman
     * 
     * @return \Illuminate\View\View - Menampilkan view admin.games.index dengan data game
     */
    public function index()
    {
        // Ambil semua game dengan pagination 10 data per halaman
        $games = Game::paginate(10);
        return view('admin.games.index', compact('games'));
    }

    /**
     * Menampilkan form untuk membuat game baru
     * 
     * @return \Illuminate\View\View - Menampilkan view form tambah game
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Menyimpan game baru ke database
     * 
     * Fungsi ini memvalidasi input dari form, menangani upload foto,
     * dan menyimpan data game ke database.
     * 
     * Validasi meliputi:
     * - name: required, string, max 255 karakter
     * - description: required, string
     * - price: required, numeric (harga per hari)
     * - image: optional, image file (jpeg, png, jpg, gif, webp)
     * - rank_from: optional, string, max 50 karakter
     * - rank_to: optional, string, max 50 karakter
     * 
     * @param Request $request - Data dari form
     * @return \Illuminate\Http\RedirectResponse - Redirect ke halaman games dengan pesan sukses
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'rank_from' => 'nullable|string|max:50',
            'rank_to' => 'nullable|string|max:50',
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Generate nama file dengan timestamp dan nama game
            $filename = time() . '_' . str_replace(' ', '_', $validated['name']) . '.' . $file->getClientOriginalExtension();
            // Simpan file ke folder public/uploads/games
            $file->move(public_path('uploads/games'), $filename);
            // Tambahkan nama file ke data yang akan disimpan
            $validated['image'] = $filename;
        }

        // Simpan data game ke database
        Game::create($validated);
        
        // Redirect ke halaman games dengan pesan sukses
        return redirect()->route('admin.games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail game (tidak digunakan saat ini)
     * 
     * @param string $id - ID game
     */
    public function show(string $id)
    {
        // Function ini tidak digunakan
    }

    /**
     * Menampilkan form untuk mengedit game
     * 
     * Fungsi ini mengambil data game berdasarkan ID dan menampilkan form edit
     * 
     * @param string $id - ID game yang akan diedit
     * @return \Illuminate\View\View - Menampilkan view form edit game
     */
    public function edit(string $id)
    {
        // Cari game berdasarkan ID, jika tidak ada throw 404
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Memperbarui data game di database
     * 
     * Fungsi ini memvalidasi input, menghapus foto lama jika ada upload foto baru,
     * dan memperbarui data game di database.
     * 
     * @param Request $request - Data dari form edit
     * @param string $id - ID game yang akan diupdate
     * @return \Illuminate\Http\RedirectResponse - Redirect ke halaman games dengan pesan sukses
     */
    public function update(Request $request, string $id)
    {
        // Cari game berdasarkan ID
        $game = Game::findOrFail($id);
        
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'rank_from' => 'nullable|string|max:50',
            'rank_to' => 'nullable|string|max:50',
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($game->image && file_exists(public_path('uploads/games/' . $game->image))) {
                unlink(public_path('uploads/games/' . $game->image));
            }

            // Upload foto baru
            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', $validated['name']) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/games'), $filename);
            $validated['image'] = $filename;
        }

        // Update data game di database
        $game->update($validated);
        
        // Redirect ke halaman games dengan pesan sukses
        return redirect()->route('admin.games.index')->with('success', 'Game berhasil diupdate!');
    }

    /**
     * Menghapus game dari database
     * 
     * Fungsi ini mencari game berdasarkan ID dan menghapusnya dari database.
     * Foto game akan tetap tersimpan di folder uploads (perlu dihapus manual jika diperlukan).
     * 
     * @param string $id - ID game yang akan dihapus
     * @return \Illuminate\Http\RedirectResponse - Redirect ke halaman games dengan pesan sukses
     */
    public function destroy(string $id)
    {
        // Cari game berdasarkan ID
        $game = Game::findOrFail($id);
        // Hapus game dari database
        $game->delete();
        // Redirect ke halaman games dengan pesan sukses
        return redirect()->route('admin.games.index')->with('success', 'Game berhasil dihapus!');
    }
}
