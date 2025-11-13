<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Game - Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-4 shadow-lg border-b border-purple-600">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-[#FFEE2F]">Ressz Joki Admin</h1>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-gray-300">Welcome, Admin!</span>
                <a href="{{ route('admin.logout') }}" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 border-r border-purple-600 min-h-screen">
            <nav class="p-6 space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.games.index') }}" class="block px-4 py-3 rounded-lg bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                    🎮 Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                    🖼️ Kelola Galeri
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('admin.games.index') }}" class="text-purple-400 hover:text-purple-300 mb-4 inline-block">← Kembali ke Daftar Game</a>
                <h2 class="text-3xl font-bold text-[#FFEE2F]">Edit Game</h2>
            </div>

            <!-- Form -->
            <div class="bg-gray-900 border border-purple-600 rounded-lg p-8 max-w-2xl">
                <form action="{{ route('admin.games.update', $game->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Game -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nama Game</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $game->name) }}"
                            required 
                            class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition @error('name') border-red-500 @enderror"
                            placeholder="Contoh: Valorant Rank Booster"
                        />
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Harga (Rp)</label>
                        <input 
                            type="number" 
                            id="price" 
                            name="price" 
                            value="{{ old('price', $game->price) }}"
                            required 
                            step="1000"
                            class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition @error('price') border-red-500 @enderror"
                            placeholder="100000"
                        />
                        @error('price')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                        <textarea 
                            id="description" 
                            name="description" 
                            required 
                            rows="6"
                            class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition @error('description') border-red-500 @enderror"
                            placeholder="Deskripsikan layanan joki game ini..."
                        >{{ old('description', $game->description) }}</textarea>
                        @error('description')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Game -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-300 mb-2">Foto Game (Opsional)</label>
                        
                        <!-- Preview gambar saat ini -->
                        @if($game->image)
                            <div class="mb-4">
                                <p class="text-gray-400 text-sm mb-2">Foto saat ini:</p>
                                <img src="{{ asset('uploads/games/' . $game->image) }}" alt="{{ $game->name }}" class="w-32 h-32 object-cover rounded-lg border border-purple-600">
                            </div>
                        @endif

                        <div class="relative">
                            <input 
                                type="file" 
                                id="image" 
                                name="image" 
                                accept="image/*"
                                class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition @error('image') border-red-500 @enderror"
                            />
                            <p class="text-gray-500 text-xs mt-2">Format: JPG, PNG, GIF, WebP | Ukuran: Tanpa batasan | Biarkan kosong jika tidak ingin mengubah foto</p>
                        </div>
                        @error('image')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <button 
                            type="submit" 
                            class="flex-1 bg-linear-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 px-6 py-3 rounded-lg transition font-semibold"
                        >
                            Update Game
                        </button>
                        <a href="{{ route('admin.games.index') }}" class="flex-1 bg-gray-800 hover:bg-gray-700 px-6 py-3 rounded-lg transition font-semibold text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</body>
</html>
