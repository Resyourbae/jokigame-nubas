@extends('user.layout')

@section('title', 'Beranda - Ressz Joki')

@section('content')

{{-- hero --}}
<section class="bg-linear-to-r from-header1 to-header2 py-12 pt-20 md:py-20">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center ">
            <!-- Left Content -->
            <div class="text-white">
                <!-- Badge -->
                <div class="inline-block bg-[#6D19B1] px-2 py-1 rounded-md text-sm font-semibold border border-b-fuchsia-600 mb-2">
                    Trusted Game Boosting Service
                </div>

                <!-- Lottie Animation - Mobile View (Between Badge and Heading) -->
                <div class="flex md:hidden justify-center my-6">
                    <div class="w-56 h-56 sm:w-64 sm:h-64 flex items-center justify-center">
                        <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
                        <dotlottie-wc src="https://lottie.host/f5d6707f-ac24-4e50-9dd0-03cc80fe6004/8fNNUtK6pH.lottie" style="width: 100%; height: 100%;" autoplay loop></dotlottie-wc>
                    </div>
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl md:text-5xl font-bold text-[#FFEE2F] mb-6 leading-tight">
                    Jasa Joki Game Online Profesional
                </h1>

                <!-- Description -->
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    Tingkatkan rank dan level game favorit Anda dengan aman dan cepat. Kami melayani berbagai game populer dengan jaminan keamanan 100%
                </p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#layanan" class="bg-fuchsia-600 hover:bg-fuchsia-700 text-white font-semibold px-6 py-3 rounded-md transition delay-100 duration-200 hover:shadow-md hover:shadow-purple-500
                     ease-in-out hover:-translate-y-1 hover:scale-100 inline-flex items-center justify-center gap-2">
                        <span>Lihat layanan</span>
                        <span>→</span>
                    </a>
                    <a href="#kontak" class="bg-white hover:bg-gray-100 text-black font-semibold px-6 py-3 rounded-md transition delay-100 duration-200 hover:shadow-md hover:shadow-gray-500
                     ease-in-out hover:-translate-y-1 hover:scale-100 items-center text-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Right Content - Illustration (Desktop) -->
            <div class="hidden md:flex justify-center">
                <div class="relative w-full max-w-md ml-9">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
                        <dotlottie-wc src="https://lottie.host/f5d6707f-ac24-4e50-9dd0-03cc80fe6004/8fNNUtK6pH.lottie" style="width: 1200px;height: 1200px" autoplay loop></dotlottie-wc>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- tentang kami --}}
<div id="tentang-kami" class="bg-linear-to-r from-tentangkami1 to-tentangkami2 py-12 md:py-20">
    <div class="container mx-auto px-6">
        <h1 class="text-center text-2xl text-gray-100 font-bold font-display mb-4">Tentang Kami</h1>
        <p class="text-center text-lg text-gray-300 mb-12 font-display">Ressz Joki adalah layanan joki game online terpercaya dengan pengalaman lebih dari 5 tahun</p>
        
        <!-- Cards Container -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: 100% Aman -->
            <div class="bg-gray-900 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100" data-aos="fade-up" data-aos-duration="1000">
                <div class="flex items-center justify-center w-12 h-12 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#b223e7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check-icon lucide-shield-check"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <h3 class="text-white text-lg font-bold mb-3">100% Aman</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Keamanan akun Anda adalah prioritas utama kami. Semua proses dilakukan dengan metode yang aman dan terpercaya.</p>
            </div>

            <!-- Card 2: Proses Cepat -->
            <div class="bg-gray-900 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100" data-aos="fade-up" data-aos-duration="1000">
                <div class="flex items-center justify-center w-12 h-12 mb-4">
                   <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#b223e7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap-icon lucide-zap"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>
                </div>
                <h3 class="text-white text-lg font-bold mb-3">Proses Cepat</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Tim profesional kami bekerja cepat dan efisien untuk menyelesaikan pesanan Anda tepat waktu.</p>
            </div>

            <!-- Card 3: Terpercaya -->
            <div class="bg-gray-900 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100" data-aos="fade-up" data-aos-duration="1000">
                <div class="flex items-center justify-center w-12 h-12 mb-4">
                   <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#b223e7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                </div>
                <h3 class="text-white text-lg font-bold mb-3">Terpercaya</h3>
                <p class="text-gray-300 text-sm leading-relaxed">Ribuan pelanggan puas telah mempercayai layanan kami. Rating 4.9/5 dari 1000+ review.</p>
            </div>
        </div>
    </div>
</div>

{{-- layanan kami --}}
<div id="layanan" class="bg-linear-to-r from-layanan1 to-layanan2 py-12 md:py-20">
    <div class="container mx-auto px-6">
        <h1 class="text-center text-gray-100 font-bold text-2xl mb-4">Layanan Kami</h1>
        <p class="text-center text-lg text-gray-300 mb-12 font-display">Berbagai pilihan layanan joki untuk game favorit Anda</p>
        
        <!-- Services Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @forelse($games as $game)
                <!-- Service Card -->
                <div class="relative group overflow-hidden rounded-2xl h-80 sm:h-80 md:h-80 lg:h-96 cursor-pointer" data-aos="fade-up" data-aos-duration="1000">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        @if($game->image)
                            <img src="{{ asset('uploads/games/' . $game->image) }}" alt="{{ $game->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-full bg-linear-to-br from-purple-600 to-purple-900 flex items-center justify-center text-6xl">
                                🎮
                            </div>
                        @endif
                        <!-- Dark Overlay Gradient Base -->
                        <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent opacity-80"></div>
                        
                        <!-- Additional Dark Overlay on Hover -->
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-40 transition duration-300"></div>
                    </div>

                    <!-- Content Overlay -->
                    <div class="absolute inset-0 flex flex-col justify-between p-6 z-10">
                        <!-- Top Section (empty for spacing) -->
                        <div></div>

                        <!-- Bottom Section with Info -->
                        <div class="space-y-4">
                            <!-- Game Name -->
                            <div>
                                <h3 class="text-[#FFEE2F] font-bold text-2xl mb-2 truncate">{{ $game->name }}</h3>
                            </div>

                            <!-- Price -->
                            <p class="text-pink-400 font-bold text-lg">
                                Mulai Rp {{ number_format($game->price, 0, ',', '.') }}/hari
                            </p>

                            <!-- Order Button -->
                            <button type="button" class="order-btn block w-full bg-linear-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white text-center py-3 rounded-lg font-bold text-sm transition duration-300 transform hover:scale-105"
                                data-game-id="{{ $game->id }}"
                                data-game-name="{{ $game->name }}"
                                data-game-price="{{ $game->price }}"
                                data-rank-from="{{ $game->rank_from ?? '' }}"
                                data-rank-to="{{ $game->rank_to ?? '' }}">
                                Pesan Sekarang
                            </button>

                            <!-- Detail Button -->
                            <a href="{{ route('user.game.detail', $game->id) }}" class="block w-full bg-gray-400 hover:bg-gray-500 text-black text-center py-2 rounded-lg font-bold text-sm transition duration-300 transform hover:scale-105">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg">Belum ada layanan yang tersedia</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- galeri --}}
<div id="galeri" class="bg-linear-to-r from-tentangkami1 to-tentangkami2 py-12 md:py-20">
    <div class="container mx-auto px-6">
        <h1 class="text-center text-gray-100 font-bold text-2xl mb-4">Galeri Kami</h1>
        <p class="text-center text-lg text-gray-300 mb-12 font-display">Lihat hasil kerja dan testimoni dari pelanggan kami</p>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6" id="gallery-grid">
            @forelse($galleries as $gallery)
                <!-- Gallery Item -->
                <div class="relative group overflow-hidden rounded-2xl cursor-pointer gallery-card h-56 sm:h-64 md:h-72 lg:h-80" 
                     data-gallery-id="{{ $gallery->id }}"
                     data-gallery-title="{{ $gallery->title }}"
                     data-gallery-desc="{{ $gallery->description }}"
                     data-gallery-image="{{ asset($gallery->image_path) }}"
                     data-aos="fade-up" data-aos-duration="1000">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        @if($gallery->image_path)
                            <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-full bg-linear-to-br from-purple-600 to-purple-900 flex items-center justify-center text-6xl">
                                🖼️
                            </div>
                        @endif
                    </div>

                    <!-- Content Overlay -->
                    <div class="absolute inset-0 flex flex-col justify-end z-10">
                        <!-- Bottom Section with Info - Purple Background Full Width -->
                        <div class="bg-linear-to-b from-purple-600/80 to-purple-700/90 p-4 space-y-2 transform transition-transform duration-500 group-hover:translate-y-full">
                            <!-- Gallery Title -->
                            <h3 class="text-white font-bold text-lg truncate">{{ $gallery->title }}</h3>
                            <!-- Description as subtitle -->
                            <p class="text-gray-100 text-sm line-clamp-2 leading-tight">{{ $gallery->description }}</p>
                        </div>
                    </div>

                    <!-- Hover Overlay (Only on hover) -->
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition duration-300"></div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg">Belum ada galeri yang ditambahkan</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- kontak --}}
<div id="kontak" class="bg-linear-to-r from-ungutuwak to-layanan2 py-12 md:py-20">
    <div class="container mx-auto px-6">
        <h1 class="text-center text-gray-100 font-bold text-2xl mb-4">Hubungi Kami</h1>
        <p class="text-center text-lg text-gray-300 mb-12 font-display">Siap untuk meningkatkan performa game Anda? Hubungi kami sekarang!</p>
        
        <!-- Contact Methods Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <!-- Whatsapp -->
            <a href="https://wa.me/your-number" target="_blank" class="group bg-gray-800 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-105 cursor-pointer text-center h-32 flex flex-col items-center justify-center"
                data-aos="fade-up" data-aos-duration="1000">
                <div class="flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white transition">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg group-hover:text-white">Whatsapp</h3>
            </a>

            <!-- Email -->
            <a href="mailto:your-email@example.com" class="group bg-gray-800 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-105 cursor-pointer text-center h-32 flex flex-col items-center justify-center"
                data-aos="fade-up" data-aos-duration="1000">
                <div class="flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white transition">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg group-hover:text-white">Email</h3>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/ayser_nii/" target="_blank" class="group bg-gray-800 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-105 cursor-pointer text-center h-32 flex flex-col items-center justify-center"
                data-aos="fade-up" data-aos-duration="1000">
                <div class="flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white transition">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <circle cx="17.5" cy="6.5" r="1.5"/>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg group-hover:text-white">Instagram</h3>
            </a>
        </div>
    </div>
</div>

<script>
  // Gallery Modal handlers
  const galleryOverlay = document.createElement('div');
  galleryOverlay.id = 'gallery-modal-overlay';
  galleryOverlay.className = 'fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50';
  galleryOverlay.style.display = 'none';
  galleryOverlay.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
  galleryOverlay.innerHTML = `
    <div class="bg-gray-900 rounded-lg p-6 w-11/12 md:w-2/3 lg:w-1/2 text-white max-h-[90vh] overflow-y-auto border-1 border-fuchsia-600">
      <button id="gallery-modal-close" class="float-right text-gray-400 text-2xl cursor-pointer hover:text-gray-200 transition"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" 
        fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x">
        <path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
      <div class="clear-both"></div>
      <h2 id="gallery-modal-title" class="text-2xl font-bold mb-4"></h2>
      <img id="gallery-modal-image" src="" alt="" class="w-full rounded-lg mb-4" />
      <p id="gallery-modal-desc" class="text-gray-300"></p>
    </div>
  `;
  document.body.appendChild(galleryOverlay);

  const galleryModalOverlay = document.getElementById('gallery-modal-overlay');
  const galleryModalTitle = document.getElementById('gallery-modal-title');
  const galleryModalImage = document.getElementById('gallery-modal-image');
  const galleryModalDesc = document.getElementById('gallery-modal-desc');

  // Handle gallery card clicks
  document.querySelectorAll('.gallery-card').forEach(card => {
    card.addEventListener('click', () => {
      galleryModalTitle.innerText = card.dataset.galleryTitle;
      galleryModalImage.src = card.dataset.galleryImage;
      galleryModalImage.alt = card.dataset.galleryTitle;
      galleryModalDesc.innerText = card.dataset.galleryDesc;
      galleryModalOverlay.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    });
  });

  document.getElementById('gallery-modal-close').addEventListener('click', () => {
    galleryModalOverlay.style.display = 'none';
    document.body.style.overflow = 'auto';
  });

  // Close modal jika klik di luar modal
  galleryModalOverlay.addEventListener('click', (e) => {
    if (e.target === galleryModalOverlay) {
      galleryModalOverlay.style.display = 'none';
      document.body.style.overflow = 'auto';
    }
  });

  // ===== LOGIN REQUIRED MODAL =====
  const loginRequiredModal = document.createElement('div');
  loginRequiredModal.id = 'login-required-modal';
  loginRequiredModal.className = 'fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50';
  loginRequiredModal.style.display = 'none';
  loginRequiredModal.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
  loginRequiredModal.innerHTML = `
    <div class="bg-gray-900 rounded-lg p-8 w-11/12 md:w-1/2 lg:w-1/3 text-white border border-purple-600">
      <div class="text-center mb-6">
        <svg class="w-16 h-16 mx-auto mb-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
        <h2 class="text-2xl font-bold mb-2">Login Diperlukan</h2>
        <p class="text-gray-400">Anda perlu login untuk membuat pesanan</p>
      </div>

      <div class="space-y-4">
        <a href="{{ route('user.login') }}" class="block w-full bg-linear-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white text-center py-3 rounded-lg font-bold transition duration-300">
          Login
        </a>
        <p class="text-center text-gray-400">
          Belum punya akun? 
          <a href="{{ route('user.register') }}" class="text-purple-400 hover:text-purple-300 font-bold">Daftar di sini</a>
        </p>
      </div>

      <button class="mt-6 w-full text-gray-400 hover:text-gray-200 transition" onclick="document.getElementById('login-required-modal').style.display = 'none'; document.body.style.overflow = 'auto';">
        Tutup
      </button>
    </div>
  `;
  document.body.appendChild(loginRequiredModal);

  // ===== ORDER MODAL =====
  const orderModal = document.createElement('div');
  orderModal.id = 'order-modal';
  orderModal.className = 'fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50';
  orderModal.style.display = 'none';
  orderModal.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
  orderModal.innerHTML = `
    <div class="bg-gray-900 rounded-lg p-8 w-11/12 md:w-1/2 lg:w-2/5 text-white max-h-[90vh] overflow-y-auto border border-purple-600">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Pesan <span id="order-game-name" class="text-pink-400"></span></h2>
        <button onclick="document.getElementById('order-modal').style.display = 'none'; document.body.style.overflow = 'auto';" class="text-gray-400 text-2xl cursor-pointer hover:text-gray-200 transition">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
          </svg>
        </button>
      </div>

      <form id="order-form" method="POST" action="{{ route('orders.store') }}" class="space-y-4">
        @csrf

        <!-- Hidden Game ID -->
        <input type="hidden" id="order-game-id" name="game_id">

        <!-- Current Rank (Display Only) -->
        <div id="rank-container" style="display: none;">
          <label class="block text-sm font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Target Rank</label>
          <div class="bg-gray-800 border border-purple-600 rounded-lg p-3">
            <p class="text-white">
              <span class="font-bold" id="rank-from-display">-</span>
              <span class="mx-2">→</span>
              <span class="font-bold" id="rank-to-display">-</span>
            </p>
          </div>
        </div>

        <!-- Start Date -->
        <div>
          <label class="block text-sm font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Tanggal Mulai</label>
          <input type="date" id="start-date" name="start_date" required 
            class="w-full bg-gray-800 border border-purple-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-purple-600">
        </div>

        <!-- End Date -->
        <div>
          <label class="block text-sm font-bold mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Tanggal Selesai</label>
          <input type="date" id="end-date" name="end_date" required 
            class="w-full bg-gray-800 border border-purple-600 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-purple-600">
        </div>

        <!-- Duration Display -->
        <div class="bg-gray-800 border border-purple-600 rounded-lg p-4">
          <p class="text-sm text-gray-400 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="9"/><polyline points="12 6 12 12 16 14"/></svg>Durasi Pesanan</p>
          <p id="duration-display" class="text-xl font-bold text-pink-400">-</p>
        </div>

        <!-- Price Display -->
        <div class="bg-gray-800 border border-purple-600 rounded-lg p-4">
          <p class="text-sm text-gray-400 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/></svg>Total Harga</p>
          <p id="price-display" class="text-2xl font-bold text-yellow-400">Rp 0</p>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-linear-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white font-bold py-3 rounded-lg transition duration-300 transform hover:scale-105">
          ✅ Konfirmasi Pesanan
        </button>
      </form>
    </div>
  `;
  document.body.appendChild(orderModal);

  // ===== ORDER BUTTON HANDLERS =====
  const orderBtns = document.querySelectorAll('.order-btn');
  const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

  orderBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();

      if (!isAuthenticated) {
        document.getElementById('login-required-modal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
        return;
      }

      const gameId = btn.dataset.gameId;
      const gameName = btn.dataset.gameName;
      const gamePrice = parseInt(btn.dataset.gamePrice);
      const rankFrom = btn.dataset.rankFrom;
      const rankTo = btn.dataset.rankTo;

      // Reset form
      document.getElementById('order-form').reset();
      document.getElementById('order-game-id').value = gameId;
      document.getElementById('order-game-name').innerText = gameName;
      document.getElementById('start-date').value = '';
      document.getElementById('end-date').value = '';
      document.getElementById('duration-display').innerText = '-';
      document.getElementById('price-display').innerText = 'Rp 0';

      // Handle rank display
      const rankContainer = document.getElementById('rank-container');
      if (rankFrom && rankTo) {
        document.getElementById('rank-from-display').innerText = rankFrom;
        document.getElementById('rank-to-display').innerText = rankTo;
        rankContainer.style.display = 'block';
      } else {
        rankContainer.style.display = 'none';
      }

      // Store game price untuk perhitungan
      window.currentGamePrice = gamePrice;

      // Set minimum date to today
      const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, '0');
      const day = String(today.getDate()).padStart(2, '0');
      const minDate = `${year}-${month}-${day}`;
      
      document.getElementById('start-date').setAttribute('min', minDate);
      document.getElementById('end-date').setAttribute('min', minDate);

      document.getElementById('order-modal').style.display = 'flex';
      document.body.style.overflow = 'hidden';
    });
  });

  // ===== PRICE CALCULATOR =====
  const startDateInput = document.getElementById('start-date');
  const endDateInput = document.getElementById('end-date');
  const durationDisplay = document.getElementById('duration-display');
  const priceDisplay = document.getElementById('price-display');

  function calculatePrice() {
    if (!startDateInput.value || !endDateInput.value) return;

    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    if (endDate < startDate) {
      durationDisplay.innerText = 'Tanggal tidak valid';
      return;
    }

    const duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1;
    const totalPrice = duration * window.currentGamePrice;

    durationDisplay.innerText = duration + ' hari';
    priceDisplay.innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');
  }

  startDateInput.addEventListener('change', () => {
    endDateInput.setAttribute('min', startDateInput.value);
    calculatePrice();
  });

  endDateInput.addEventListener('change', calculatePrice);

  // Close modals when clicking outside
  document.getElementById('login-required-modal').addEventListener('click', (e) => {
    if (e.target === document.getElementById('login-required-modal')) {
      document.getElementById('login-required-modal').style.display = 'none';
      document.body.style.overflow = 'auto';
    }
  });

  document.getElementById('order-modal').addEventListener('click', (e) => {
    if (e.target === document.getElementById('order-modal')) {
      document.getElementById('order-modal').style.display = 'none';
      document.body.style.overflow = 'auto';
    }
  });
</script>

@endsection

