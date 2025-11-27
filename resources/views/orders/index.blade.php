@extends('user.layout')

@section('content')
<div class="min-h-screen bg-gray-900 pt-20 pb-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back to Home Button (Di Atas) -->
        <div class="mb-8">
            <a href="{{ route('home') }}" class="text-purple-400 hover:text-purple-300 font-semibold inline-flex items-center gap-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Page Header -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-white mb-1">Pesanan Saya</h1>
                <p class="text-gray-400">Lihat dan kelola status pesanan joki game Anda</p>
            </div>
            
            <!-- Data Limit Selector -->
            @if($totalOrders > 0)
                <div class="flex items-center gap-3">
                    <label for="limit-select" class="text-gray-400 font-medium">Tampilkan:</label>
                    <select 
                        id="limit-select" 
                        onchange="changeLimit(this.value)"
                        class="px-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 cursor-pointer hover:border-gray-600 transition"
                    >
                        <option value="3" {{ $currentLimit === 3 || $currentLimit === '3' ? 'selected' : '' }}>3 Data</option>
                        <option value="5" {{ $currentLimit === 5 || $currentLimit === '5' ? 'selected' : '' }}>5 Data</option>
                        <option value="10" {{ $currentLimit === 10 || $currentLimit === '10' ? 'selected' : '' }}>10 Data</option>
                        <option value="30" {{ $currentLimit === 30 || $currentLimit === '30' ? 'selected' : '' }}>30 Data</option>
                        <option value="50" {{ $currentLimit === 50 || $currentLimit === '50' ? 'selected' : '' }}>50 Data</option>
                        <option value="all" {{ $currentLimit === 'all' ? 'selected' : '' }}>Semua Data</option>
                    </select>
                </div>
            @endif
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-900/30 border border-green-600 rounded-lg p-4 text-green-400 flex items-start gap-3">
                <svg class="w-5 h-5 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Orders Container -->
        @forelse($orders as $order)
            <div class="mb-6 bg-gray-800 border border-gray-700 rounded-xl overflow-hidden hover:border-purple-500/50 transition-all">
                <!-- Order Header -->
                <div class="bg-gray-800 px-6 py-5 border-b border-gray-700">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $order->game->name }}</h3>
                            <p class="text-gray-400 text-sm">Order ID: <span class="text-gray-300 font-mono">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span></p>
                        </div>
                        <!-- Status Badge -->
                        <div>
                            @if($order->status === 'menunggu')
                                <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-900/40 border border-amber-600/60 text-amber-300 rounded-lg text-sm font-semibold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                                    </svg>
                                    Menunggu Persetujuan
                                </span>
                            @elseif($order->status === 'diproses')
                                <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-900/40 border border-blue-600/60 text-blue-300 rounded-lg text-sm font-semibold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    Sedang Diproses
                                </span>
                            @elseif($order->status === 'diterima')
                                <span class="inline-flex items-center gap-2 px-4 py-2 bg-green-900/40 border border-green-600/60 text-green-300 rounded-lg text-sm font-semibold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Diterima/Selesai
                                </span>
                            @elseif($order->status === 'ditolak')
                                <span class="inline-flex items-center gap-2 px-4 py-2 bg-red-900/40 border border-red-600/60 text-red-300 rounded-lg text-sm font-semibold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    Ditolak
                                </span>
                            @elseif($order->status === 'dibatalkan')
                                <span class="inline-flex items-center gap-2 px-4 py-2 bg-gray-700/40 border border-gray-600/60 text-gray-300 rounded-lg text-sm font-semibold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    Dibatalkan
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Order Details Grid -->
                <div class="px-6 py-5 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Tanggal Mulai -->
                    <div class="bg-gray-700/30 rounded-lg p-4 border border-gray-700/50">
                        <p class="text-gray-500 text-xs font-medium uppercase tracking-wide mb-2">Tanggal Mulai</p>
                        <p class="text-white font-bold text-lg">{{ $order->start_date->format('d M') }}</p>
                        <p class="text-gray-400 text-xs">{{ $order->start_date->format('Y') }}</p>
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="bg-gray-700/30 rounded-lg p-4 border border-gray-700/50">
                        <p class="text-gray-500 text-xs font-medium uppercase tracking-wide mb-2">Tanggal Selesai</p>
                        <p class="text-white font-bold text-lg">{{ $order->end_date->format('d M') }}</p>
                        <p class="text-gray-400 text-xs">{{ $order->end_date->format('Y') }}</p>
                    </div>

                    <!-- Durasi -->
                    <div class="bg-gray-700/30 rounded-lg p-4 border border-gray-700/50">
                        <p class="text-gray-500 text-xs font-medium uppercase tracking-wide mb-2">Durasi</p>
                        <p class="text-white font-bold text-lg">{{ $order->duration_days }}</p>
                        <p class="text-gray-400 text-xs">hari</p>
                    </div>

                    <!-- Total Harga -->
                    <div class="bg-amber-900/20 rounded-lg p-4 border border-amber-600/50">
                        <p class="text-amber-600 text-xs font-medium uppercase tracking-wide mb-2">Total Harga</p>
                        <p class="text-amber-400 font-bold text-lg">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Tanggal Order -->
                <div class="px-6 py-3 bg-gray-900/30 border-t border-gray-700">
                    <p class="text-gray-500 text-sm">Dipesan pada <span class="text-gray-400">{{ $order->created_at->format('d M Y H:i') }}</span></p>
                </div>

                <!-- Admin Notes (jika ada) -->
                @if($order->admin_notes && $order->status === 'ditolak')
                    <div class="mx-6 mt-4 p-4 bg-red-900/20 border border-red-600/50 rounded-lg">
                        <p class="text-red-400 font-semibold text-sm flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Alasan Penolakan
                        </p>
                        <p class="text-red-300 text-sm">{{ $order->admin_notes }}</p>
                    </div>
                @endif

                <!-- Status Message (jika ada) -->
                @if($order->status_message && in_array($order->status, ['diproses', 'ditolak', 'diterima']))
                    <div class="mx-6 mt-4 p-4 bg-blue-900/20 border border-blue-600/50 rounded-lg">
                        <p class="text-blue-400 font-semibold text-sm flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                            </svg>
                            Pesan dari Admin
                        </p>
                        <p class="text-blue-300 text-sm">{{ $order->status_message }}</p>
                    </div>
                @endif

                <!-- Action Buttons -->
                @if($order->status === 'menunggu')
                    <div class="px-6 py-5 bg-gray-900/30 border-t border-gray-700">
                        <form method="POST" action="{{ route('orders.cancel', $order) }}" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');" class="inline">
                            @csrf
                            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                Batalkan Pesanan
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <!-- Empty State -->
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-12 text-center">
                <svg class="w-20 h-20 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h3 class="text-2xl font-bold text-white mb-2">Keranjang Kosong</h3>
                <p class="text-gray-400 mb-6">Anda belum membuat pesanan. Mulai pesan sekarang!</p>
                <a href="{{ route('home') }}#layanan" class="inline-block px-8 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    Lihat Layanan Kami
                </a>
            </div>
        @endforelse
    </div>
</div>

<script>
function changeLimit(limit) {
    // Redirect dengan parameter limit
    const url = new URL(window.location.href);
    url.searchParams.set('limit', limit);
    window.location.href = url.toString();
}
</script>
@endsection
