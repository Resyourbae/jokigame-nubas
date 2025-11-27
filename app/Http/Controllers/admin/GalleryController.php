<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

/**
 * GalleryController
 * 
 * Controller untuk mengelola galeri portfolio/screenshot.
 * Menangani CRUD (Create, Read, Update, Delete) untuk galeri yang ditampilkan di halaman utama.
 */
class GalleryController extends Controller
{
    /**
     * Menampilkan daftar semua galeri dengan pagination
     * 
     * Fungsi ini mengambil semua data galeri dari database dengan pagination 10 item per halaman
     * 
     * @return \Illuminate\View\View - Menampilkan view admin.galleries.index dengan data galeri
     */
    public function index()
    {
        // Ambil semua galeri dengan pagination 10 data per halaman
        $galleries = Gallery::paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Menampilkan form untuk membuat galeri baru
     * 
     * @return \Illuminate\View\View - Menampilkan view form tambah galeri
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Menyimpan galeri baru ke database
     * 
     * Fungsi ini memvalidasi input dari form, menangani upload foto,
     * dan menyimpan data galeri ke database.
     * 
     * Validasi meliputi:
     * - title: required, string, max 255 karakter
     * - image: required, image file (jpeg, png, jpg, gif)
     * - description: optional, string
     * 
     * @param Request $request - Data dari form
     * @return \Illuminate\Http\RedirectResponse - Redirect ke halaman galleries dengan pesan sukses
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable|string',
        ]);

        // Proses upload foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Generate nama file dengan timestamp
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Simpan file ke folder public/uploads/galleries
            $image->move(public_path('uploads/galleries'), $imageName);
            // Tambahkan path gambar ke data yang akan disimpan
            $validated['image_path'] = 'uploads/galleries/' . $imageName;
        }

        // Simpan data galeri ke database
        Gallery::create($validated);
        
        // Redirect ke halaman galleries dengan pesan sukses
        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail galeri (tidak digunakan saat ini)
     * 
     * @param string $id - ID galeri
     */
    public function show(string $id)
    {
        // Function ini tidak digunakan
    }

    /**
     * Menampilkan form untuk mengedit galeri
     * 
     * Fungsi ini mengambil data galeri berdasarkan ID dan menampilkan form edit
     * 
     * @param string $id - ID galeri yang akan diedit
     * @return \Illuminate\View\View - Menampilkan view form edit galeri
     */
    public function edit(string $id)
    {
        // Cari galeri berdasarkan ID, jika tidak ada throw 404
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Memperbarui data galeri di database
     * 
     * Fungsi ini memvalidasi input, menangani upload foto baru jika ada,
     * dan memperbarui data galeri di database.
     * 
     * @param Request $request - Data dari form edit
     * @param string $id - ID galeri yang akan diupdate
     * @return \Illuminate\Http\RedirectResponse - Redirect ke halaman galleries dengan pesan sukses
     */
    public function update(Request $request, string $id)
    {
        // Cari galeri berdasarkan ID
        $gallery = Gallery::findOrFail($id);
        
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable|string',
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/galleries'), $imageName);
            $validated['image_path'] = 'uploads/galleries/' . $imageName;
        }

        // Update data galeri di database
        $gallery->update($validated);
        
        // Redirect ke halaman galleries dengan pesan sukses
        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diupdate!');
    }

    /**
     * Menghapus galeri dari database
     * 
     * Fungsi ini mencari galeri berdasarkan ID dan menghapusnya dari database.
     * 
     * @param string $id - ID galeri yang akan dihapus
     * @return \Illuminate\Http\RedirectResponse - Redirect ke halaman galleries dengan pesan sukses
     */
    public function destroy(string $id)
    {
        // Cari galeri berdasarkan ID
        $gallery = Gallery::findOrFail($id);
        // Hapus galeri dari database
        $gallery->delete();
        // Redirect ke halaman galleries dengan pesan sukses
        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus!');
    }
}
