<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Game - Admin Dashboard</title>
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
            <div class="mb-8">
                <a href="{{ route('admin.games.index') }}" class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-700 mb-4 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                        <line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Kembali ke Daftar Game
                </a>
                <h1 class="text-4xl font-bold bg-linear-to-r from-purple-600 via-blue-600 to-cyan-600 bg-clip-text text-transparent">Edit Game</h1>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 shadow-sm max-w-2xl">
                <form action="{{ route('admin.games.update', $game->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Game -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Nama Game</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $game->name) }}"
                            required 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition @error('name') border-red-500 @enderror"
                            placeholder="Contoh: Valorant Rank Booster"
                        />
                        @error('name')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-900 mb-2">Harga (Rp)</label>
                        <input 
                            type="number" 
                            id="price" 
                            name="price" 
                            value="{{ old('price', $game->price) }}"
                            required 
                            step="1000"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition @error('price') border-red-500 @enderror"
                            placeholder="100000"
                        />
                        @error('price')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi</label>
                        <textarea 
                            id="description" 
                            name="description" 
                            required 
                            rows="4"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition @error('description') border-red-500 @enderror"
                            placeholder="Deskripsikan layanan joki game ini..."
                        >{{ old('description', $game->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Foto Game -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-900 mb-2">Foto Game</label>
                        
                        <!-- Preview gambar saat ini -->
                        @if($game->image)
                            <div class="mb-4">
                                <p class="text-gray-600 text-sm mb-2 font-medium">Foto saat ini:</p>
                                <img src="{{ asset('uploads/games/' . $game->image) }}" alt="{{ $game->name }}" class="w-32 h-32 object-cover rounded-xl border border-gray-200 shadow-sm">
                            </div>
                        @endif

                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            accept="image/*"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition @error('image') border-red-500 @enderror"
                            onchange="previewImage(this)"
                        />
                        <p class="text-gray-500 text-xs mt-2">Format: JPG, PNG, GIF, WebP | Biarkan kosong jika tidak ingin mengubah foto</p>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <img id="previewImg" src="" alt="Preview" class="w-32 h-32 object-cover rounded-xl border border-gray-200 shadow-sm">
                            <p class="text-green-600 text-sm mt-2 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                Foto baru berhasil dipilih
                            </p>
                        </div>

                        @error('image')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Rank From -->
                    <div>
                        <label for="rank_from" class="block text-sm font-semibold text-gray-900 mb-2">Rank Dari (Opsional)</label>
                        <input 
                            type="text" 
                            id="rank_from" 
                            name="rank_from" 
                            value="{{ old('rank_from', $game->rank_from) }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition"
                            placeholder="Contoh: Bronze I, Gold III, Radiant"
                        />
                    </div>

                    <!-- Rank To -->
                    <div>
                        <label for="rank_to" class="block text-sm font-semibold text-gray-900 mb-2">Rank Ke (Opsional)</label>
                        <input 
                            type="text" 
                            id="rank_to" 
                            name="rank_to" 
                            value="{{ old('rank_to', $game->rank_to) }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition"
                            placeholder="Contoh: Platinum II, Immortal I, Radiant"
                        />
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-6 border-t border-gray-200">
                        <button 
                            type="submit" 
                            class="flex-1 bg-linear-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white py-3 rounded-lg transition font-semibold shadow-sm hover:shadow-md flex items-center justify-center gap-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            Update Game
                        </button>
                        <a href="{{ route('admin.games.index') }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-900 py-3 rounded-lg transition font-semibold text-center">
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

    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
