<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - Ressz Joki</title>
    <link rel="stylesheet" href="https://lottie.host/4fa58a41-9584-47d5-8612-3995d5d882c6/ISVHm9wSpn.lottie">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-4 shadow-lg border-b border-purple-600">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold font-display italic text-[#FFEE2F]">Ressz Joki <span class="text-[#f8a809] ">Admin</span></h1>
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-icon lucide-package">
                        <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"/>
                        <path d="M12 22V12"/>
                        <polyline points="3.29 7 12 12 20.71 7"/>
                        <path d="m7.5 4.27 9 5.15"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.games.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad2-icon lucide-gamepad-2">
                        <line x1="6" x2="10" y1="11" y2="11"/>
                        <line x1="8" x2="8" y1="9" y2="13"/>
                        <line x1="15" x2="15.01" y1="12" y2="12"/>
                        <line x1="18" x2="18.01" y1="10" y2="10"/>
                        <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                    </svg>
                    Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-icon lucide-image">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                        <circle cx="9" cy="9" r="2"/>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                    </svg>
                    Kelola Galeri
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 transition">
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
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-[#ffc60c] mb-2">Dashboard</h2>
                <p class="text-gray-800">Selamat datang di panel admin Ressz Joki</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Games Card -->
                <div class="bg-linear-to-br from-purple-900 to-purple-800 rounded-lg p-6 border border-purple-600 hover:shadow-lg hover:shadow-purple-600 
                transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-300 text-sm font-medium">Total Game</p>
                            <p class="text-4xl font-bold text-[#FFEE2F] mt-2">{{ $totalGames }}</p>
                        </div>
                        <div class="text-5xl opacity-20"><svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="#db7676" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad2-icon lucide-gamepad-2"><line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01"
                             y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604
                             9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/></svg></div>
                    </div>
                    <a href="{{ route('admin.games.index') }}" class="text-purple-300 hover:text-purple-200 text-sm mt-4 inline-block">
                        Kelola Game →
                    </a>
                </div>

                <!-- Total Galleries Card -->
                <div class="bg-linear-to-br from-blue-900 to-blue-800 rounded-lg p-6 border border-blue-600 hover:shadow-lg hover:shadow-blue-800 
                transition delay-200 duration-400 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-300 text-sm font-medium">Total Galeri</p>
                            <p class="text-4xl font-bold text-[#FFEE2F] mt-2">{{ $totalGalleries }}</p>
                        </div>
                        <div class="text-5xl opacity-20"><svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="#cadb76" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-icon lucide-image"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg></div>
                    </div>
                    <a href="{{ route('admin.galleries.index') }}" class="text-blue-300 hover:text-blue-200 text-sm mt-4 inline-block">
                        Kelola Galeri →
                    </a>
                </div>

                <!-- Total Orders Card -->
                <div class="bg-linear-to-br from-cyan-900 to-cyan-800 rounded-lg p-6 border border-cyan-600 hover:shadow-lg hover:shadow-cyan-800 
                transition delay-200 duration-400 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-300 text-sm font-medium">Total Order</p>
                            <p class="text-4xl font-bold text-[#FFEE2F] mt-2">{{ $totalOrders }}</p>
                        </div>
                        <div class="text-5xl opacity-20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="#db76c8" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-icon lucide-package"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"/><path d="M12 22V12"/><polyline points="3.29 7 12 12 20.71 7"/><path d="m7.5 4.27 9 5.15"/></svg>
                        </div>
                    </div>
                    <a href="#" class="text-cyan-300 hover:text-cyan-200 text-sm mt-4 inline-block">
                        Lihat Order →
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gray-800 border border-purple-600 rounded-lg p-6">
                <h3 class="text-xl font-bold text-[#FFEE2F] mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('admin.games.create') }}" class="bg-linear-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 px-6 py-3 rounded-lg transition font-semibold flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14"/>
                            <path d="M12 5v14"/>
                        </svg>
                        Tambah Game Baru
                    </a>
                    <a href="{{ route('admin.galleries.create') }}" class="bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-3 rounded-lg transition font-semibold flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14"/>
                            <path d="M12 5v14"/>
                        </svg>
                        Tambah Galeri Baru
                    </a>
                </div>
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
