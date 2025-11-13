<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Game - Admin Dashboard</title>
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
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-[#FFEE2F]">Kelola Game</h2>
                    <p class="text-gray-400 mt-1">Manage semua layanan game Anda</p>
                </div>
                <a href="{{ route('admin.games.create') }}" class="bg-linear-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 px-6 py-3 rounded-lg transition font-semibold">
                    ➕ Tambah Game
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500 bg-opacity-20 border border-green-500 rounded-lg">
                    <p class="text-green-400">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Table -->
            <div class="bg-gray-900 border border-purple-600 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800 border-b border-purple-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Gambar</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Nama Game</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Harga</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Deskripsi</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($games as $game)
                            <tr class="border-b border-gray-800 hover:bg-gray-800 transition">
                                <!-- Kolom Gambar -->
                                <td class="px-6 py-4">
                                    @if($game->image)
                                        <img src="{{ asset('uploads/games/' . $game->image) }}" alt="{{ $game->name }}" class="w-16 h-16 object-cover rounded-lg border border-purple-600">
                                    @else
                                        <div class="w-16 h-16 bg-gray-800 border border-purple-600 rounded-lg flex items-center justify-center text-2xl">
                                            🎮
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $game->name }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($game->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-gray-400 truncate">{{ substr($game->description, 0, 50) }}...</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.games.edit', $game->id) }}" class="text-blue-400 hover:text-blue-300 mr-4">Edit</a>
                                    <form action="{{ route('admin.games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                    Belum ada game yang ditambahkan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($games->hasPages())
                <div class="mt-6">
                    {{ $games->links() }}
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
