<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - Ressz Joki</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-linear-to-br from-ungutuwak via-purple-900 to-unguagakmuda min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <!-- Card Login -->
        <div class="bg-gray-900 bg-opacity-80 backdrop-blur-lg rounded-lg shadow-2xl p-8 border border-purple-600">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-[#FFEE2F] mb-2">Ressz Joki</h1>
                <p class="text-gray-400 text-sm">Admin Panel</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500 bg-opacity-20 border border-red-500 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p class="text-gray-100 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500 bg-opacity-20 border border-green-500 rounded-lg">
                    <p class="text-gray-100 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}"
                        required 
                        class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition"
                        placeholder="adm***"
                    />
                    @error('username')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition"
                        placeholder="••••••••"
                    />
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                        class="w-4 h-4 bg-gray-800 border-purple-600 rounded cursor-pointer"
                    />
                    <label for="remember" class="ml-2 text-sm text-gray-400 cursor-pointer">
                        Ingat saya
                    </label>
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-linear-to-r from-yellow-400 to-yellow-300 hover:from-yellow-300 hover:to-yellow-200 text-black font-bold py-3 px-4 rounded-lg transition duration-200 shadow-lg hover:shadow-xl"
                >
                    Login Sekarang
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-gray-400 text-sm">
                    © 2025 Ressz Joki. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Background Decoration -->
        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">
                Hanya untuk admin yang berwenang
            </p>
        </div>
    </div>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</body>
</html>
