@extends('user.layout')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 pt-20">
    <div class="w-full max-w-md px-6 py-8">
        <!-- Card -->
        <div class="bg-slate-800 rounded-lg shadow-2xl p-8 border border-fuchsia-600 border-opacity-30">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-yellow-400 italic font-display">Reszz Joki</h1>
                <p class="text-gray-300 mt-2">Masuk ke akun Anda</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-500 bg-opacity-10 border border-red-500 rounded-lg p-4">
                    <ul class="text-red-300 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-300 text-sm font-medium mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-500 focus:ring-opacity-30 transition"
                        placeholder="your@email.com"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-300 text-sm font-medium mb-2">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-500 focus:ring-opacity-30 transition"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-yellow-400 to-yellow-300 text-black font-bold py-2 rounded-lg hover:from-yellow-300 hover:to-yellow-200 transition duration-200 transform hover:scale-105"
                >
                    Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-1 border-t border-slate-600"></div>
                <span class="px-3 text-gray-400 text-sm">atau</span>
                <div class="flex-1 border-t border-slate-600"></div>
            </div>

            <!-- Register Link -->
            <p class="text-center text-gray-300 text-sm">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-yellow-400 font-semibold hover:text-yellow-300 transition">
                    Daftar sekarang
                </a>
            </p>
        </div>

        <!-- Back to Home -->
        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-200 transition text-sm">
                ← Kembali ke beranda
            </a>
        </div>
    </div>
</div>

@endsection
