<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ressz Joki</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://lottie.host/f5d6707f-ac24-4e50-9dd0-03cc80fe6004/8fNNUtK6pH.lottie">
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="pt-0">
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
                    <a href="#hubungi" class="bg-white hover:bg-gray-100 text-black font-semibold px-6 py-3 rounded-md transition delay-100 duration-200 hover:shadow-md hover:shadow-gray-500
                     ease-in-out hover:-translate-y-1 hover:scale-100 items-center text-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Right Content - Illustration -->
            <div class="hidden md:flex justify-center">
                <div class="relative w-full max-w-md ml-9">
                    <!-- Placeholder untuk gambar/ilustrasi -->
                    {{-- <div class="bg-linear-to-b from-header1 to-header2 opacity-20 w-80 h-80 rounded-full mx-auto"></div> --}}
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
                <div class="bg-gray-900 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 
                transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100" data-aos="fade-up"
     data-aos-duration="1000">
                    <div class="flex items-center justify-center w-12 h-12 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#b223e7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check-icon lucide-shield-check"><path d="M20 13c0 
                            5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5
                             4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-3">100% Aman</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">Keamanan akun Anda adalah prioritas utama kami. Semua proses dilakukan dengan metode yang aman dan terpercaya.</p>
                </div>

                <!-- Card 2: Proses Cepat -->
                <div class="bg-gray-900 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 
                transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100" data-aos="fade-up"
     data-aos-duration="1000">
                    <div class="flex items-center justify-center w-12 h-12 mb-4">
                       <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#b223e7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap-icon lucide-zap"><path d="M4 14a1 
                        1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-3">Proses Cepat</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">Tim profesional kami bekerja cepat dan efisien untuk menyelesaikan pesanan Anda tepat waktu.</p>
                </div>

                <!-- Card 3: Terpercaya -->
                <div class="bg-gray-900 bg-opacity-50 border border-purple-600 rounded-lg p-6 hover:shadow-lg hover:shadow-purple-600 
                transition delay-200 duration-400 ease-in-out hover:-translate-y-1 hover:scale-100"data-aos="fade-up"
     data-aos-duration="1000">
                    <div class="flex items-center justify-center w-12 h-12 mb-4">
                       <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#b223e7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 
                        .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 
                        21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($games as $game)
                    <!-- Service Card -->
                    <div class="relative group overflow-hidden rounded-2xl h-96 cursor-pointer" data-aos="fade-up" data-aos-duration="1000">
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
                                    <!-- Description as subtitle -->
                                    <p class="text-white text-sm line-clamp-2 leading-tight">{{ $game->description }}</p>
                                </div>

                                <!-- Price -->
                                <p class="text-pink-400 font-bold text-lg">
                                    Mulai {{ number_format($game->price, 0, ',', '.') }}
                                </p>

                                <!-- Detail Button -->
                                <a href="#" class="block w-full bg-gray-400 hover:bg-gray-500 text-black text-center py-3 rounded-lg font-bold text-sm transition duration-300 transform hover:scale-105">
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
</body> 
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>