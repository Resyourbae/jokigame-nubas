<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Galeri - Admin Dashboard</title>
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
                <a href="{{ route('admin.games.index') }}" class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                    🎮 Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="block px-4 py-3 rounded-lg bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                    🖼️ Kelola Galeri
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                    🧾 Kelola Orders
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('admin.galleries.index') }}" class="text-purple-400 hover:text-purple-300 mb-4 inline-block">← Kembali ke Daftar Galeri</a>
                <h2 class="text-3xl font-bold text-[#FFEE2F]">Edit Galeri</h2>
            </div>

            <!-- Form -->
            <div class="bg-gray-900 border border-purple-600 rounded-lg p-8 max-w-2xl">
                <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Judul Galeri -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Judul Galeri</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            value="{{ old('title', $gallery->title) }}"
                            required 
                            class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition @error('title') border-red-500 @enderror"
                            placeholder="Contoh: Screenshot Testimoni Pelanggan"
                        />
                        @error('title')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preview Gambar Lama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Gambar Saat Ini</label>
                        <div class="bg-gray-800 rounded-lg overflow-hidden h-48">
                            <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Upload Gambar Baru -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-300 mb-2">Gambar Baru (Opsional)</label>
                        <div class="border-2 border-dashed border-purple-600 rounded-lg p-6 text-center hover:border-yellow-400 transition">
                            <input 
                                type="file" 
                                id="image" 
                                name="image" 
                                accept="image/*"
                                class="hidden"
                                onchange="document.getElementById('fileName').textContent = this.files[0]?.name || 'Pilih file baru'"
                            />
                            <label for="image" class="cursor-pointer block">
                                <div class="text-4xl mb-2">🖼️</div>
                                <p class="text-gray-400">Klik untuk mengganti gambar atau drag & drop</p>
                                <p id="fileName" class="text-gray-500 text-sm mt-2">Tidak ada file baru</p>
                            </label>
                        </div>
                        @error('image')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Deskripsi (Opsional)</label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4"
                            class="w-full px-4 py-3 bg-gray-800 border border-purple-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition @error('description') border-red-500 @enderror"
                            placeholder="Deskripsikan gambar galeri ini..."
                        >{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <button 
                            type="submit" 
                            class="flex-1 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-3 rounded-lg transition font-semibold"
                        >
                            Update Galeri
                        </button>
                        <a href="{{ route('admin.galleries.index') }}" class="flex-1 bg-gray-800 hover:bg-gray-700 px-6 py-3 rounded-lg transition font-semibold text-center">
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
