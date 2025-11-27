<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - Ressz Joki</title>
    <link rel="stylesheet" href="https://lottie.host/4fa58a41-9584-47d5-8612-3995d5d882c6/ISVHm9wSpn.lottie">
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-linear-to-br from-slate-50 via-white to-blue-50 text-gray-900">
    <!-- Navigation -->
    <nav class="bg-linear-to-r from-purple-900 to-blue-900 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo.png') }}" alt="Ressz Joki Logo" class="h-10 w-10 object-contain">
                <h1 class="text-xl font-bold font-display italic text-white">Ressz Joki Admin</h1>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user text-yellow-300">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span class="text-white">Admin!</span>
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
                <a href="{{ route('admin.dashboard') }}" class="block w-full flex items-center gap-3 px-4 py-3 rounded-xl bg-linear-to-r from-purple-600 to-blue-600 text-white font-semibold hover:shadow-lg group cursor-pointer pointer-events-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home group-hover:scale-110">
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
            <!-- Header Section -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <h2 class="text-5xl font-bold bg-linear-to-r from-purple-600 via-blue-600 to-cyan-600 bg-clip-text text-transparent mb-3">Dashboard</h2>
                        <p class="text-gray-600 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info text-blue-600">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/>
                            </svg>
                            Pantau statistik dan kelola konten Ressz Joki
                        </p>
                    </div>
                </div>
            </div>

            <!-- Lottie Animation -->
            <div class="flex justify-center mb-12">
                <dotlottie-wc src="https://lottie.host/0c1810ec-5622-4954-8ed3-e0a4507cd9ee/wlyy9Y2Jdu.lottie" style="width: 200px; height: 200px" autoplay loop></dotlottie-wc>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Total Games Card -->
                <div class="group bg-white rounded-2xl p-8 border border-gray-200 hover:border-purple-300 hover:shadow-xl transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition duration-500 opacity-0 group-hover:opacity-100"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-linear-to-br from-purple-100 to-purple-50 rounded-xl flex items-center justify-center group-hover:from-purple-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2">
                                    <line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-3 py-1 rounded-full">Live</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Total Game</p>
                        <p class="text-4xl font-bold text-gray-900 mb-4">{{ $totalGames }}</p>
                        <a href="{{ route('admin.games.index') }}" class="text-purple-600 hover:text-purple-700 text-sm font-semibold flex items-center gap-2 group/link">
                            Kelola Game 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right group-hover/link:translate-x-1 transition">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Total Galleries Card -->
                <div class="group bg-white rounded-2xl p-8 border border-gray-200 hover:border-blue-300 hover:shadow-xl transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition duration-500 opacity-0 group-hover:opacity-100"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-linear-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center group-hover:from-blue-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Active</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Total Galeri</p>
                        <p class="text-4xl font-bold text-gray-900 mb-4">{{ $totalGalleries }}</p>
                        <a href="{{ route('admin.galleries.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-2 group/link">
                            Kelola Galeri 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right group-hover/link:translate-x-1 transition">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Total Orders Card -->
                <div class="group bg-white rounded-2xl p-8 border border-gray-200 hover:border-cyan-300 hover:shadow-xl transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-100 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition duration-500 opacity-0 group-hover:opacity-100"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-linear-to-br from-cyan-100 to-cyan-50 rounded-xl flex items-center justify-center group-hover:from-cyan-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0891b2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package">
                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"/><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-cyan-600 bg-cyan-100 px-3 py-1 rounded-full">Updated</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Total Order</p>
                        <p class="text-4xl font-bold text-gray-900 mb-4">{{ $totalOrders }}</p>
                        <a href="{{ route('admin.orders.index') }}" class="text-cyan-600 hover:text-cyan-700 text-sm font-semibold flex items-center gap-2 group/link">
                            Lihat Order 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right group-hover/link:translate-x-1 transition">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 hover:border-gray-300 transition">
                <div class="flex items-center gap-3 mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap text-amber-500">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900">Quick Actions</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('admin.games.create') }}" class="group bg-linear-to-br from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 px-6 py-4 rounded-xl transition duration-300 font-semibold flex items-center justify-center gap-3 text-white hover:shadow-lg shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus group-hover:rotate-90 transition duration-300">
                            <path d="M5 12h14"/><path d="M12 5v14"/>
                        </svg>
                        <span>Tambah Game Baru</span>
                    </a>
                    <a href="{{ route('admin.galleries.create') }}" class="group bg-linear-to-br from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-4 rounded-xl transition duration-300 font-semibold flex items-center justify-center gap-3 text-white hover:shadow-lg shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus group-hover:rotate-90 transition duration-300">
                            <path d="M5 12h14"/><path d="M12 5v14"/>
                        </svg>
                        <span>Tambah Galeri Baru</span>
                    </a>
                </div>
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
</body>
</html>
