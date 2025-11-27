@extends('user.layout')

@section('content')
<div class="min-h-screen bg-gray-900 pt-20 pb-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('home') }}" class="text-purple-400 hover:text-purple-300 font-bold inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Beranda
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
            </a>
        </div>

        <!-- Game Detail Card -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Left: Game Image -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 border border-purple-600 rounded-lg overflow-hidden">
                    @if($game->image)
                        <img src="{{ asset('uploads/games/' . $game->image) }}" alt="{{ $game->name }}" class="w-full h-80 object-cover">
                    @else
                        <div class="w-full h-80 bg-gray-700 flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Game Info -->
            <div class="lg:col-span-2">
                <!-- Game Title -->
                <h1 class="text-4xl font-bold text-white mb-2">{{ $game->name }}</h1>

                <!-- Price Badge -->
                <div class="mb-6 flex items-center bg-gradient-to-r from-purple-600 to-purple-800 text-yellow-300 font-bold text-xl rounded-lg p-4 w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fbff00" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3 flex-shrink-0">
                        <path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/>
                    </svg>
                    <span>Rp {{ number_format($game->price, 0, ',', '.') }}/hari</span>
                </div>

                <!-- Rank Info -->
                @if($game->rank_from || $game->rank_to)
                    <div class="bg-gradient-to-r from-blue-900 to-blue-800 border border-blue-600 rounded-lg p-4 mb-6">
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-300 mr-2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            <p class="text-blue-200 font-bold">Jangkauan Rank</p>
                        </div>
                        <p class="text-blue-100">
                            <span class="font-bold">{{ $game->rank_from ?? '-' }}</span>
                            <span class="mx-2">→</span>
                            <span class="font-bold">{{ $game->rank_to ?? '-' }}</span>
                        </p>
                    </div>
                @endif

                <!-- Description -->
                <div class="bg-gray-800 border border-purple-600 rounded-lg p-6 mb-8">
                    <h3 class="text-xl font-bold text-white mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c084fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                            <path d="M12 17v5"/><path d="M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z"/>
                        </svg>
                        Deskripsi Layanan
                    </h3>
                    <p class="text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $game->description }}</p>
                </div>

                <!-- Call to Action Button -->
                <button 
                    onclick="openOrderModal()"
                    class="w-full bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white font-bold py-4 px-6 rounded-lg transition duration-300 transform hover:scale-105 flex items-center justify-center text-lg"
                >
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Pesan Sekarang
                </button>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-gray-800 border border-purple-600 rounded-lg p-8 mb-12">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffdd00" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z"/>
                </svg>
                Fitur Unggulan
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#11ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mr-3">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <div>
                        <h4 class="text-white font-bold mb-1">Profesional Berpengalaman</h4>
                        <p class="text-gray-400 text-sm">Tim ahli yang berpengalaman dalam ranking games</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#11ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mr-3">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <div>
                        <h4 class="text-white font-bold mb-1">Aman & Terpercaya</h4>
                        <p class="text-gray-400 text-sm">Keamanan data dan akun Anda terjamin</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#11ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mr-3">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <div>
                        <h4 class="text-white font-bold mb-1">Layanan 24/7</h4>
                        <p class="text-gray-400 text-sm">Siap melayani Anda kapan saja</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#11ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mr-3">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <div>
                        <h4 class="text-white font-bold mb-1">Jaminan Kepuasan</h4>
                        <p class="text-gray-400 text-sm">Jika tidak puas, kami kembalikan biaya Anda</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#11ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mr-3">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <div>
                        <h4 class="text-white font-bold mb-1">Update Berkala</h4>
                        <p class="text-gray-400 text-sm">Informasi progres setiap saat</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#11ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mr-3">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <div>
                        <h4 class="text-white font-bold mb-1">Harga Kompetitif</h4>
                        <p class="text-gray-400 text-sm">Harga terbaik untuk kualitas layanan terbaik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Modal -->
<div id="order-modal" class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50 p-4" style="display: none; background-color: rgba(0, 0, 0, 0.4);">
    <div class="bg-gray-900 rounded-lg p-8 w-11/12 md:w-1/2 lg:w-2/5 text-white max-h-[90vh] overflow-y-auto border border-purple-600">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Pesan <span class="text-pink-400">{{ $game->name }}</span></h2>
            <button onclick="closeOrderModal()" class="text-gray-400 text-2xl cursor-pointer hover:text-gray-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                </svg>
            </button>
        </div>

        <div>
            <!-- Order Form -->
            <form method="POST" action="{{ route('orders.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="game_id" value="{{ $game->id }}">

                <!-- Current Rank (Display Only) -->
                @if($game->rank_from || $game->rank_to)
                    <div>
                        <label class="block text-sm font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Target Rank</label>
                        <div class="bg-gray-800 border border-purple-600 rounded-lg p-3">
                            <p class="text-white">
                                <span class="font-bold">{{ $game->rank_from ?? '-' }}</span>
                                <span class="mx-2">→</span>
                                <span class="font-bold">{{ $game->rank_to ?? '-' }}</span>
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Tanggal Mulai -->
                <div>
                    <label for="start_date" class="block text-sm font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Tanggal Mulai</label>
                    <input 
                        type="date" 
                        id="start_date" 
                        name="start_date" 
                        value="{{ old('start_date') }}"
                        required
                        class="w-full bg-gray-800 border border-purple-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-purple-600"
                    />
                    @error('start_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="end_date" class="block text-sm font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Tanggal Selesai</label>
                    <input 
                        type="date" 
                        id="end_date" 
                        name="end_date" 
                        value="{{ old('end_date') }}"
                        required
                        class="w-full bg-gray-800 border border-purple-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-purple-600"
                    />
                    @error('end_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Duration Display -->
                <div class="bg-gray-800 border border-purple-600 rounded-lg p-4">
                    <p class="text-sm text-gray-400 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="9"/><polyline points="12 6 12 12 16 14"/></svg>Durasi Pesanan</p>
                    <p id="duration-display" class="text-xl font-bold text-pink-400">-</p>
                </div>

                <!-- Price Display -->
                <div class="bg-gray-800 border border-purple-600 rounded-lg p-4">
                    <p class="text-sm text-gray-400 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/></svg>Total Harga</p>
                    <p id="total-price-display" class="text-2xl font-bold text-yellow-400">Rp 0</p>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-linear-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white font-bold py-3 rounded-lg transition duration-300 transform hover:scale-105">
                    ✅ Konfirmasi Pesanan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
const pricePerDay = {{ $game->price }};

function openOrderModal() {
    @auth
        document.getElementById('order-modal').style.display = 'flex';
    @else
        alert('Anda harus login terlebih dahulu untuk membuat pesanan');
        window.location.href = '{{ route("user.login") }}';
    @endauth
}

function closeOrderModal() {
    document.getElementById('order-modal').style.display = 'none';
}

function calculatePrice() {
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;
    
    if (startDate && endDate) {
        const start = new Date(startDate);
        const end = new Date(endDate);
        const days = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;
        
        if (days > 0) {
            const total = days * pricePerDay;
            document.getElementById('duration-display').textContent = days + ' hari';
            document.getElementById('total-price-display').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }
    }
}

document.getElementById('start_date')?.addEventListener('change', calculatePrice);
document.getElementById('end_date')?.addEventListener('change', calculatePrice);

// Set minimum date to today
const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');
const minDate = `${year}-${month}-${day}`;

document.getElementById('start_date')?.setAttribute('min', minDate);
document.getElementById('end_date')?.setAttribute('min', minDate);

// Close modal when clicking outside
document.getElementById('order-modal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeOrderModal();
    }
});
</script>
@endsection
