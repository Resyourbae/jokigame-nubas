<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/**
 * UserAuthController - User Authentication Controller
 * 
 * Mengatur proses autentikasi user/customer termasuk login, register, dan logout.
 * Menggunakan Laravel's built-in Auth Guard untuk autentikasi berbasis session.
 * User dapat membuat akun baru, login, dan logout dari aplikasi.
 */
class UserAuthController extends Controller
{
    /**
     * Menampilkan form login user
     * 
     * Jika user sudah login, redirect ke halaman home.
     * Jika belum login, tampilkan form login user.
     * 
     * @return \Illuminate\View\View View dari auth.user-login
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.user-login');
    }

    /**
     * Menampilkan form register user
     * 
     * Jika user sudah login, redirect ke halaman home.
     * Jika belum login, tampilkan form registrasi untuk membuat akun baru.
     * 
     * @return \Illuminate\View\View View dari auth.user-register
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.user-register');
    }

    /**
     * Memproses login user
     * 
     * Memvalidasi email dan password dari form login.
     * Menggunakan Auth::attempt() untuk autentikasi dengan credentials.
     * Jika berhasil, regenerate session dan redirect ke home.
     * Jika gagal, kembalikan ke form dengan error message.
     * 
     * Validasi:
     * - email: required, valid email format
     * - password: required, minimal 6 karakter
     * 
     * @param Request $request Request dengan email dan password
     * @return \Illuminate\Http\RedirectResponse Redirect ke home atau kembali ke form
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login dengan email dan password
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Login gagal, return dengan error message
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Memproses registrasi user baru
     * 
     * Validasi data pendaftaran dari form registrasi.
     * Membuat user baru di database dengan password yang di-hash.
     * Setelah registrasi, langsung login dan redirect ke home.
     * 
     * Validasi:
     * - name: required, string, max 255 karakter
     * - email: required, valid email format, unique di tabel users
     * - password: required, min 6 karakter, confirmed (password_confirmation harus sama)
     * 
     * @param Request $request Request dengan name, email, password, password_confirmation
     * @return \Illuminate\Http\RedirectResponse Redirect ke home dengan pesan sukses
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Buat user baru dengan password ter-hash
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Langsung login setelah registrasi
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil! Selamat datang di Ressz Joki.');
    }

    /**
     * Memproses logout user
     * 
     * Logout user dari aplikasi.
     * Invalidate session dan regenerate token CSRF untuk keamanan.
     * Redirect ke halaman home dengan pesan sukses.
     * 
     * @param Request $request Request object untuk akses session
     * @return \Illuminate\Http\RedirectResponse Redirect ke home
     */
    public function logout(Request $request)
    {
        // Logout dari Auth guard
        Auth::logout();

        // Invalidate session dan regenerate token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout berhasil!');
    }
}

