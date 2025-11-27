<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Game - Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-linear-to-br from-slate-50 via-white to-blue-50 text-gray-900">
    <!-- Navigation -->
    <nav class="bg-linear-to-r from-purple-900 to-blue-900 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo.png') }}" alt="Ressz Joki Logo" class="h-10 w-10 object-contain">
                <h1 class="text-xl font-bold text-white">Ressz Joki Admin</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user text-yellow-300">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span class="text-white">Admin</span>
                </div>
                <a href="{{ route('admin.logout') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2 font-medium text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/>
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-72 bg-white border-r border-gray-200 min-h-screen pt-8 px-6 fixed h-screen overflow-y-auto z-40">
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 group font-medium cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home text-purple-600 group-hover:scale-110">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.games.index') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-linear-to-r from-purple-600 to-blue-600 text-white font-semibold hover:shadow-lg group cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2 group-hover:scale-110">
                        <line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                    </svg>
                    Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 group font-medium cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-gallery text-blue-600 group-hover:scale-110">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                    </svg>
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-cyan-50 group font-medium cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list text-cyan-600 group-hover:scale-110">
                        <rect x="8" y="2" width="12" height="4" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 9h6"/><path d="M9 13h6"/><path d="M9 17h3"/>
                    </svg>
                    Lihat Order
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72 p-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-4xl font-bold bg-linear-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent mb-2">Kelola Game</h2>
                    <p class="text-gray-600 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2 text-purple-600">
                            <line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                        </svg>
                        Manage semua layanan game Anda
                    </p>
                </div>
                <a href="{{ route('admin.games.create') }}" class="group bg-linear-to-br from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 px-6 py-3 rounded-xl transition font-semibold flex items-center gap-2 text-white hover:shadow-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus group-hover:rotate-90 transition duration-300">
                        <path d="M5 12h14"/><path d="M12 5v14"/>
                    </svg>
                    Tambah Game
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle text-green-600">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Table -->
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-linear-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Gambar</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Nama Game</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Harga</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Deskripsi</th>
                                <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($games as $game)
                                <tr class="hover:bg-gray-50 transition">
                                    <!-- Kolom Gambar -->
                                    <td class="px-6 py-4">
                                        @if($game->image)
                                            <img src="{{ asset('uploads/games/' . $game->image) }}" alt="{{ $game->name }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm">
                                        @else
                                            <div class="w-16 h-16 bg-linear-to-br from-purple-100 to-purple-50 border border-purple-200 rounded-lg flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                                                    <line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $game->name }}</td>
                                    <td class="px-6 py-4 text-purple-600 font-semibold">Rp {{ number_format($game->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-gray-600 truncate text-sm">{{ substr($game->description, 0, 50) }}...</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('admin.games.edit', $game->id) }}" class="text-blue-600 hover:text-blue-700 hover:bg-blue-50 px-3 py-1 rounded-lg transition flex items-center gap-1 font-medium text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <button onclick="openDeleteModal({{ $game->id }}, '{{ $game->name }}')" class="text-red-600 hover:text-red-700 hover:bg-red-50 px-3 py-1 rounded-lg transition flex items-center gap-1 font-medium text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                                                    <polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox mx-auto mb-3 text-gray-400">
                                            <polyline points="22 12 18 12 15 21 9 21 6 12 2 12"/><path d="M9 3h6v7H9z"/>
                                        </svg>
                                        <p class="text-gray-600 font-medium">Belum ada game yang ditambahkan</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(168, 85, 247, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }
    </style>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/50 justify-center items-center z-50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full border border-gray-200 shadow-2xl">
            <div class="flex items-center justify-center mb-6">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                        <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-2xl font-bold text-gray-900 text-center mb-2">Hapus Game</h2>
            <p class="text-gray-600 text-center mb-6">
                Apakah Anda yakin ingin menghapus game <span id="gameName" class="font-semibold text-gray-900"></span>? 
                <br>
                <span class="text-sm">Tindakan ini tidak dapat dibatalkan.</span>
            </p>

            <div class="flex gap-3 pt-4">
                <button onclick="closeDeleteModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-900 py-3 rounded-lg font-semibold transition">
                    Batal
                </button>
                <form id="deleteForm" method="POST" style="flex: 1;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-semibold transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let deleteGameId = null;

        function openDeleteModal(gameId, gameName) {
            deleteGameId = gameId;
            document.getElementById('gameName').textContent = gameName;
            document.getElementById('deleteForm').action = `/admin/games/${gameId}`;
            document.getElementById('deleteModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.getElementById('deleteModal').style.display === 'flex') {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>
