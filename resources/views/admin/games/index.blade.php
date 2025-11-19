<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Game - Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-4 shadow-lg border-b border-purple-600">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold font-display italic text-[#FFEE2F]">Ressz Joki <span class="text-[#f8a809]">Admin</span></h1>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-gray-200">Welcome, Admin!</span>
                <a href="{{ route('admin.logout') }}" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" x2="9" y1="12" y2="12"/>
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 border-r border-purple-600 min-h-screen">
            <nav class="p-6 space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-icon lucide-package">
                        <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"/>
                        <path d="M12 22V12"/>
                        <polyline points="3.29 7 12 12 20.71 7"/>
                        <path d="m7.5 4.27 9 5.15"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.games.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad2-icon lucide-gamepad-2">
                        <line x1="6" x2="10" y1="11" y2="11"/>
                        <line x1="8" x2="8" y1="9" y2="13"/>
                        <line x1="15" x2="15.01" y1="12" y2="12"/>
                        <line x1="18" x2="18.01" y1="10" y2="10"/>
                        <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                    </svg>
                    Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-icon lucide-image">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                        <circle cx="9" cy="9" r="2"/>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                    </svg>
                    Kelola Galeri
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-icon lucide-list">
                        <line x1="8" x2="21" y1="6" y2="6"/>
                        <line x1="8" x2="21" y1="12" y2="12"/>
                        <line x1="8" x2="21" y1="18" y2="18"/>
                        <line x1="3" x2="3.01" y1="6" y2="6"/>
                        <line x1="3" x2="3.01" y1="12" y2="12"/>
                        <line x1="3" x2="3.01" y1="18" y2="18"/>
                    </svg>
                    Lihat Order
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-[#ffc60c]">Kelola Game</h2>
                    <p class="text-gray-800 mt-1">Manage semua layanan game Anda</p>
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
