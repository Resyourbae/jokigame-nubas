<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**
 * AuthController - Admin Authentication Controller
 * 
 * Mengatur proses autentikasi admin termasuk login dan logout.
 * Menggunakan Session untuk menyimpan data admin yang sudah login.
 * Admin credentials disimpan di tabel admins dengan password yang di-hash.
 */
class AuthController extends Controller
{
    /**
     * Menampilkan form login admin
     * 
     * Menampilkan view form login untuk admin memasukkan username dan password.
     * 
     * @return \Illuminate\View\View View dari admin.login
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Memproses login admin
     * 
     * Memvalidasi username dan password yang dikirim dari form login.
     * Jika valid, mencari admin di database berdasarkan username.
     * Mengecek kecocokan password menggunakan Hash::check().
     * Jika valid, menyimpan admin_id dan admin_name ke Session.
     * Redirect ke dashboard jika berhasil, atau kembali ke form jika gagal.
     * 
     * Validasi:
     * - username: required, string
     * - password: required
     * 
     * @param Request $request Request dari form login dengan username dan password
     * @return \Illuminate\Http\RedirectResponse Redirect ke dashboard atau form login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->username);
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    /**
     * Memproses logout admin
     * 
     * Menghapus admin_id dan admin_name dari Session.
     * Redirect ke halaman login dengan pesan sukses.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirect ke halaman login
     */
    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_name');
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    }
}


