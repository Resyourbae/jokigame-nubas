<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Pesanan - Admin Ressz Joki</title>
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
        <aside class="w-72 bg-white border-r border-gray-200 min-h-screen pt-8 px-6 fixed h-screen overflow-y-auto">
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition duration-300 group font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home text-purple-600 group-hover:scale-110 transition">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.games.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition duration-300 group font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gamepad-2 text-purple-600 group-hover:scale-110 transition">
                        <line x1="6" x2="10" y1="11" y2="11"/><line x1="8" x2="8" y1="9" y2="13"/><line x1="15" x2="15.01" y1="12" y2="12"/><line x1="18" x2="18.01" y1="10" y2="10"/><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z"/>
                    </svg>
                    Kelola Game
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 transition duration-300 group font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-gallery text-blue-600 group-hover:scale-110 transition">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                    </svg>
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-linear-to-r from-cyan-600 to-blue-600 text-white font-semibold hover:shadow-lg transition duration-300 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list group-hover:scale-110 transition">
                        <rect x="8" y="2" width="12" height="4" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 9h6"/><path d="M9 13h6"/><path d="M9 17h3"/>
                    </svg>
                    Lihat Order
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72 p-8">
            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-5xl font-bold bg-linear-to-r from-purple-600 via-blue-600 to-cyan-600 bg-clip-text text-transparent mb-3">Kelola Pesanan</h1>
                <p class="text-gray-600 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list text-cyan-600">
                        <rect x="8" y="2" width="12" height="4" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 9h6"/><path d="M9 13h6"/><path d="M9 17h3"/>
                    </svg>
                    Kelola dan proses pesanan dari pelanggan
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Pending Orders Card -->
                <div class="group bg-white rounded-2xl p-8 border border-gray-200 hover:border-amber-300 hover:shadow-xl transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-100 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition duration-500 opacity-0 group-hover:opacity-100"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-linear-to-br from-amber-100 to-amber-50 rounded-xl flex items-center justify-center group-hover:from-amber-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#b45309" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-amber-600 bg-amber-100 px-3 py-1 rounded-full">Pending</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Menunggu Proses</p>
                        <p class="text-4xl font-bold text-gray-900 mb-4">{{ $pendingOrders->count() }}</p>
                    </div>
                </div>

                <!-- Processing Orders Card -->
                <div class="group bg-white rounded-2xl p-8 border border-gray-200 hover:border-blue-300 hover:shadow-xl transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition duration-500 opacity-0 group-hover:opacity-100"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-linear-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center group-hover:from-blue-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap">
                                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Processing</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Sedang Diproses</p>
                        <p class="text-4xl font-bold text-gray-900 mb-4">{{ $processedOrders->where('status', 'diproses')->count() }}</p>
                    </div>
                </div>

                <!-- Completed Orders Card -->
                <div class="group bg-white rounded-2xl p-8 border border-gray-200 hover:border-green-300 hover:shadow-xl transition duration-300 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-100 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition duration-500 opacity-0 group-hover:opacity-100"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-14 h-14 bg-linear-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center group-hover:from-green-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0fd225" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-check-icon lucide-check-check">
                                    <path d="M18 6 7 17l-5-5"/><path d="m22 10-7.5 7.5L13 16"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">Completed</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium mb-2">Total Selesai</p>
                        <p class="text-4xl font-bold text-gray-900 mb-4">{{ $processedOrders->where('status', 'diterima')->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle text-green-600">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle text-red-600 mt-0.5 shrink-0">
                        <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
                    </svg>
                    <ul class="flex-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Pending Orders Section -->
            <div class="mb-12">
                <div class="mb-6 flex items-center gap-3">
                    <div class="w-1 h-8 bg-amber-500 rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900">Pesanan Menunggu Proses</h2>
                    <span class="ml-auto px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold">
                        {{ $pendingOrders->count() }} pesanan
                    </span>
                </div>

                @if ($pendingOrders->count() > 0)
                    <div class="space-y-4">
                        @foreach ($pendingOrders as $order)
                            <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:border-amber-300 hover:shadow-lg transition duration-300 group">
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                                    <!-- Order ID & Status -->
                                    <div class="md:col-span-2">
                                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide mb-2">Order ID</p>
                                        <p class="text-gray-900 font-bold text-lg">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                                        <p class="text-gray-500 text-xs">{{ $order->created_at->format('d M Y') }}</p>
                                    </div>

                                    <!-- User & Game Info -->
                                    <div class="md:col-span-3">
                                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide mb-2">Detail Pesanan</p>
                                        <p class="text-gray-900 font-semibold">{{ $order->user->name }}</p>
                                        <p class="text-gray-600 text-sm">{{ $order->game->name }}</p>
                                    </div>

                                    <!-- Dates -->
                                    <div class="md:col-span-2">
                                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide mb-2">Periode</p>
                                        <p class="text-gray-900 text-sm font-medium">{{ $order->start_date->format('d/m') }} - {{ $order->end_date->format('d/m') }}</p>
                                        <p class="text-gray-500 text-xs">{{ $order->duration }} hari</p>
                                    </div>

                                    <!-- Price -->
                                    <div class="md:col-span-2">
                                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wide mb-2">Total Harga</p>
                                        <p class="text-amber-600 font-bold text-lg">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Actions -->
                                    <div class="md:col-span-3 flex gap-3">
                                        <button onclick="openModal({{ $order->id }}, 'diproses')" class="flex-1 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-2 px-3 rounded-lg text-sm font-semibold transition-all shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                            Terima
                                        </button>
                                        <button onclick="openModal({{ $order->id }}, 'ditolak')" class="flex-1 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 py-2 px-3 rounded-lg text-sm font-semibold transition-all border border-red-200 flex items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                                <line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/>
                                            </svg>
                                            Tolak
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white border border-gray-200 rounded-2xl p-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox mx-auto mb-4 text-gray-400">
                            <polyline points="22 12 18 12 15 21 9 21 6 12 2 12"/><path d="M9 3h6v7H9z"/>
                        </svg>
                        <p class="text-gray-600 font-medium">Tidak ada pesanan yang menunggu proses</p>
                    </div>
                @endif
            </div>

            <!-- Processed Orders Section -->
            <div>
                <div class="mb-6 flex items-center gap-3">
                    <div class="w-1 h-8 bg-blue-500 rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900">Pesanan Terproses</h2>
                    <span class="ml-auto px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                        {{ $processedOrders->count() }} pesanan
                    </span>
                </div>

                @if ($processedOrders->count() > 0)
                    <div class="space-y-4">
                        @foreach ($processedOrders as $order)
                            <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:border-blue-300 hover:shadow-lg transition duration-300">
                                <!-- Header Row -->
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2 flex-wrap">
                                            <p class="text-gray-900 font-bold text-lg">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                                            @if ($order->status === 'diproses')
                                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-semibold flex items-center gap-1.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap">
                                                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                                                    </svg>
                                                    Sedang Diproses
                                                </span>
                                            @elseif ($order->status === 'diterima')
                                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-semibold flex items-center gap-1.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                                                    </svg>
                                                    Diterima/Selesai
                                                </span>
                                            @else
                                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-semibold flex items-center gap-1.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-circle">
                                                        <circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/>
                                                    </svg>
                                                    Ditolak
                                                </span>
                                            @endif
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            {{ $order->user->name }} • {{ $order->game->name }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-amber-600 font-bold text-lg">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                                        <p class="text-gray-500 text-xs">{{ $order->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                                <!-- Action Row -->
                                <div class="flex justify-end">
                                    @if ($order->status === 'diproses')
                                        <button onclick="openModal({{ $order->id }}, 'diterima')" class="bg-linear-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white py-2 px-6 rounded-lg text-sm font-semibold transition-all shadow-sm hover:shadow-md flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                            Selesaikan
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white border border-gray-200 rounded-2xl p-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox mx-auto mb-4 text-gray-400">
                            <polyline points="22 12 18 12 15 21 9 21 6 12 2 12"/><path d="M9 3h6v7H9z"/>
                        </svg>
                        <p class="text-gray-600 font-medium">Belum ada pesanan yang terproses</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>

<!-- Status Update Modal -->
<div id="statusModal" class="fixed inset-0 bg-black/50 justify-center items-center z-50 p-4" style="display: none;">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full border border-gray-200 shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Ubah Status Pesanan</h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                    <line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/>
                </svg>
            </button>
        </div>
        
        <form id="statusForm" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div id="statusInfo" class="bg-blue-50 border border-blue-200 rounded-lg p-3 text-blue-700 text-sm font-medium"></div>

            <!-- Status Display -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Status Baru</label>
                <input type="text" id="statusDisplay" readonly class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <input type="hidden" name="status" id="statusValue">
            </div>

            <!-- Admin Notes (for rejection) -->
            <div id="adminNotesDiv" style="display: none;">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Alasan Penolakan</label>
                <textarea name="admin_notes" id="adminNotes" rows="3" placeholder="Jelaskan alasan penolakan pesanan..." class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 resize-none"></textarea>
            </div>

            <!-- Status Message -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Pesan untuk User (Opsional)</label>
                <textarea name="status_message" rows="2" placeholder="Pesan yang akan dilihat oleh user..." class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 resize-none"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-900 py-2 rounded-lg font-semibold transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-linear-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white py-2 rounded-lg font-semibold transition shadow-md hover:shadow-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let currentOrderId = null;
let currentStatus = null;
let currentFromStatus = null;

const statusLabels = {
    'diproses': 'Sedang Diproses',
    'diterima': 'Diterima/Selesai',
    'ditolak': 'Ditolak'
};

const statusMessages = {
    'pending->diproses': 'Terima Pesanan',
    'diproses->diterima': 'Selesaikan Pesanan',
    'pending->ditolak': 'Tolak Pesanan'
};

function openModal(orderId, newStatus) {
    currentOrderId = orderId;
    currentStatus = newStatus;
    
    // Determine the action title based on status change
    let actionTitle = 'Ubah Status Pesanan';
    if (newStatus === 'diproses') {
        actionTitle = 'Terima Pesanan';
    } else if (newStatus === 'diterima') {
        actionTitle = 'Selesaikan Pesanan';
    } else if (newStatus === 'ditolak') {
        actionTitle = 'Tolak Pesanan';
    }
    
    document.querySelector('#statusModal h2').textContent = actionTitle;
    document.getElementById('statusValue').value = newStatus;
    document.getElementById('statusDisplay').value = statusLabels[newStatus];
    document.getElementById('statusInfo').textContent = `Pesanan #${String(orderId).padStart(5, '0')}`;
    
    // Show admin notes field only for rejection
    document.getElementById('adminNotesDiv').style.display = newStatus === 'ditolak' ? 'block' : 'none';
    
    // Update form action
    document.getElementById('statusForm').action = `/admin/orders/${orderId}/status`;
    
    // Show modal
    document.getElementById('statusModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('statusModal').style.display = 'none';
    document.getElementById('statusForm').reset();
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('statusModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.getElementById('statusModal').style.display === 'flex') {
        closeModal();
    }
});
</script>

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
