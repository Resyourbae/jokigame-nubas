@extends('user.layout')

@section('title', 'Login - Ressz Joki')

@section('content')

<!-- Login Page -->
<div class="min-h-screen bg-linear-to-r from-header1 to-header2 flex items-center justify-center px-6 py-12 pt-24">
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-gray-900 border border-purple-600 rounded-lg p-8 shadow-2xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#FFEE2F] mb-2">Masuk</h1>
                <p class="text-gray-400">Selamat datang kembali di Ressz Joki</p>
            </div>

            <!-- Form -->
            <form action="{{ route('user.login.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition"
                        placeholder="Masukkan email Anda"
                    >
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition"
                        placeholder="Masukkan password Anda"
                    >
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-linear-to-r from-purple-600 to-fuchsia-600 hover:from-purple-700 hover:to-fuchsia-700 text-white font-semibold py-3 rounded-lg transition duration-200 transform hover:scale-105"
                >
                    Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-600"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-gray-900 text-gray-400">Belum punya akun?</span>
                </div>
            </div>

            <!-- Register Link -->
            <a href="{{ route('user.register') }}" class="w-full block text-center bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Daftar Sekarang
            </a>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-purple-400 hover:text-purple-300 text-sm transition">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
