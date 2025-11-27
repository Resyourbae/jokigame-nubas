<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Galeri - Admin Dashboard</title>
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
                <a href="{{ route('admin.games.index') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 group font-medium cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2 text-purple-600 group-hover:scale-110">
                        <line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                    </svg>
                    Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-linear-to-r from-blue-600 to-cyan-600 text-white font-semibold hover:shadow-lg group cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-gallery group-hover:scale-110">
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
                <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-4 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                        <line x1="19" x2="5" y1="12" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Kembali ke Daftar Galeri
                </a>
                <h1 class="text-4xl font-bold bg-linear-to-r from-blue-600 via-cyan-600 to-teal-600 bg-clip-text text-transparent">Tambah Galeri Baru</h1>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 shadow-sm max-w-2xl">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Judul Galeri -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-900 mb-2">Judul Galeri</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            value="{{ old('title') }}"
                            required 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition @error('title') border-red-500 @enderror"
                            placeholder="Contoh: Screenshot Testimoni Pelanggan"
                        />
                        @error('title')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-900 mb-2">Gambar Galeri</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50 transition relative min-h-48 bg-gray-50">
                            <input 
                                type="file" 
                                id="image" 
                                name="image" 
                                required 
                                accept="image/*"
                                class="hidden"
                                onchange="previewGalleryImage(this); document.getElementById('fileName').textContent = this.files[0]?.name || 'Pilih file'"
                            />
                            
                            <!-- Upload Icon and Text -->
                            <div id="uploadPrompt" class="block">
                                <label for="image" class="cursor-pointer block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image mx-auto mb-3 text-blue-400">
                                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                    </svg>
                                    <p class="text-gray-700 font-medium">Klik untuk memilih gambar atau drag & drop</p>
                                    <p id="fileName" class="text-gray-500 text-sm mt-2">Belum ada file dipilih</p>
                                </label>
                            </div>

                            <!-- Image Preview Container -->
                            <div id="galleryImagePreview" class="hidden flex flex-col items-center justify-center">
                                <div class="relative w-fit">
                                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-32 h-16 bg-green-400 rounded-full blur-2xl opacity-70 animate-pulse"></div>
                                    <img id="galleryPreviewImg" src="" alt="Preview" class="h-40 object-contain rounded-lg relative z-10">
                                </div>
                                <p class="text-green-600 text-sm mt-3 flex items-center gap-2 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                                    </svg>
                                    Foto berhasil ditambahkan
                                </p>
                            </div>
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

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi (Opsional)</label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition @error('description') border-red-500 @enderror"
                            placeholder="Deskripsikan gambar galeri ini..."
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-6 border-t border-gray-200">
                        <button 
                            type="submit" 
                            class="flex-1 bg-linear-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white py-3 rounded-lg transition font-semibold shadow-sm hover:shadow-md flex items-center justify-center gap-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            Simpan Galeri
                        </button>
                        <a href="{{ route('admin.galleries.index') }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-900 py-3 rounded-lg transition font-semibold text-center">
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
                radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }
    </style>

    <script>
        function previewGalleryImage(input) {
            const previewContainer = document.getElementById('galleryImagePreview');
            const uploadPrompt = document.getElementById('uploadPrompt');
            const previewImg = document.getElementById('galleryPreviewImg');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadPrompt.classList.add('hidden');
                    previewContainer.classList.remove('hidden');
                    previewContainer.classList.add('flex', 'flex-col', 'items-center', 'justify-center');
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
                uploadPrompt.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
