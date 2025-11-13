<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Galeri - Admin Dashboard</title>
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
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-[#FFEE2F]">Kelola Galeri</h2>
                    <p class="text-gray-400 mt-1">Manage semua galeri portofolio Anda</p>
                </div>
                <a href="{{ route('admin.galleries.create') }}" class="bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-3 rounded-lg transition font-semibold">
                    ➕ Tambah Galeri
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500 bg-opacity-20 border border-green-500 rounded-lg">
                    <p class="text-green-400">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($galleries as $gallery)
                    <div class="bg-gray-900 border border-purple-600 rounded-lg overflow-hidden hover:shadow-lg hover:shadow-purple-600 transition">
                        <div class="bg-gray-800 h-48 overflow-hidden">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover hover:scale-105 transition">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white mb-2">{{ $gallery->title }}</h3>
                            <p class="text-gray-400 text-sm mb-4">{{ substr($gallery->description, 0, 100) }}...</p>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-center transition">
                                    Edit
                                </a>
                                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-4 py-2 rounded transition" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-400">Belum ada galeri yang ditambahkan</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($galleries->hasPages())
                <div class="mt-6">
                    {{ $galleries->links() }}
                </div>
            @endif
        </main>
    </div>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</body>
</html>
