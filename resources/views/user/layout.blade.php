<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Ressz Joki')</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Navbar hide/show animation */
        #navbar {
            transition: all 0.3s ease-in-out;
            transform: translateY(0);
        }

        #navbar.navbar-hide {
            transform: translateY(-100%);
        }

        #navbar.navbar-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="pt-0">
    {{-- Navbar --}}
    @if(!request()->routeIs('user.login', 'user.register'))
    <nav id="navbar" class="fixed top-0 left-0 right-0 w-full z-50 bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-4 border-b border-b-fuchsia-600 opacity-100 shadow-lg backdrop-blur-md">
        <div class="flex items-center justify-between gap-6">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0 cursor-pointer hover:opacity-80 transition">
                <img src="/logo.png" alt="logo" class="w-10 h-10">
                <span class="text-[#FFEE2F] font-bold italic font-display text-xl whitespace-nowrap">Reszz Joki</span>
            </a>

            <!-- Hamburger Menu (Mobile) -->
            @if(!request()->routeIs('user.game.detail', 'orders.index'))
                <button id="hamburger" class="lg:hidden flex items-center justify-center cursor-pointer relative w-7 h-7">
                    <!-- Hamburger Icon -->
                    <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute transition-all duration-300">
                        <path d="M4 6h16"/>
                        <path d="M4 12h16"/>
                        <path d="M4 18h16"/>
                    </svg>

                    <!-- Close Icon -->
                    <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute transition-all duration-300 opacity-0 scale-0 rotate-90">
                        <path d="M18 6l-12 12"/>
                        <path d="M6 6l12 12"/>
                    </svg>
                </button>
            @endif

            <!-- Menu Desktop -->
            @if(!request()->routeIs('user.game.detail', 'orders.index'))
                <ul class="hidden lg:flex space-x-8 text-gray-200 flex-1 justify-center">
                    <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition" data-scroll-to="home">Beranda</a></li>
                    <li><a href="{{ route('home') }}#tentang-kami" class="hover:text-yellow-400 transition" data-scroll-to="tentang-kami">Tentang</a></li>
                    <li><a href="{{ route('home') }}#layanan" class="hover:text-yellow-400 transition" data-scroll-to="layanan">Layanan</a></li>
                    <li><a href="{{ route('home') }}#galeri" class="hover:text-yellow-400 transition" data-scroll-to="galeri">Galeri</a></li>
                    <li><a href="{{ route('home') }}#kontak" class="hover:text-yellow-400 transition" data-scroll-to="kontak">Kontak</a></li>
                </ul>
            @endif

            <!-- User Menu Desktop -->
            @auth
                <div class="hidden lg:flex items-center gap-5 shrink-0">
                    <!-- Shopping Cart Icon -->
                    <a href="{{ route('orders.index') }}" class="relative flex items-center justify-center w-11 h-11 rounded-full text-white hover:text-yellow-400 font-bold transition hover:scale-110 duration-300" title="Keranjang Pesanan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center justify-center w-11 h-11 rounded-full bg-purple-600 hover:bg-purple-700 text-white font-bold transition text-sm hover:scale-110 hover:shadow-lg hover:shadow-purple-500/50 duration-300 border-2 border-purple-400/50">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-3 w-52 bg-linear-to-b from-gray-800 to-gray-900 border border-purple-600/50 rounded-xl shadow-2xl shadow-purple-900/50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 backdrop-blur-sm">
                            <div class="p-3 border-b border-purple-600/30">
                                <p class="text-sm text-gray-400">Halo,</p>
                                <p class="text-white font-bold text-lg truncate">{{ Auth::user()->name }}</p>
                            </div>
                            <a href="{{ route('user.logout') }}" class="flex mx-2 mt-3 mb-2 px-4 py-3 text-gray-300 hover:bg-linear-to-r hover:from-red-600 hover:to-red-700 hover:text-white rounded-lg transition duration-200 font-medium items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Login/Register Buttons Desktop -->
                <div class="hidden lg:flex items-center gap-3 shrink-0">
                    <a href="{{ route('user.login') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-6 py-2 rounded-lg transition duration-300 hover:shadow-lg hover:shadow-purple-600/50 transform hover:scale-105">
                        Login
                    </a>
                    <a href="{{ route('user.register') }}" class="bg-linear-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-black font-medium px-6 py-2 rounded-lg transition duration-300 hover:shadow-lg hover:shadow-yellow-400/50 transform hover:scale-105">
                        Daftar
                    </a>
                </div>
            @endauth
        </div>

        <!-- Menu Mobile -->
        @if(!request()->routeIs('user.game.detail', 'orders.index'))
            <ul id="mobile-menu" class="hidden flex-col space-y-3 mt-4 text-gray-200 lg:hidden mobile-menu-transition">
                <li><a href="{{ route('home') }}" class="block hover:text-yellow-400 transition py-2" data-scroll-to="home">Beranda</a></li>
                <li><a href="{{ route('home') }}#tentang-kami" class="block hover:text-yellow-400 transition py-2" data-scroll-to="tentang-kami">Tentang</a></li>
                <li><a href="{{ route('home') }}#layanan" class="block hover:text-yellow-400 transition py-2" data-scroll-to="layanan">Layanan</a></li>
                <li><a href="{{ route('home') }}#galeri" class="block hover:text-yellow-400 transition py-2" data-scroll-to="galeri">Galeri</a></li>
                <li><a href="{{ route('home') }}#kontak" class="block hover:text-yellow-400 transition py-2" data-scroll-to="kontak">Kontak</a></li>
                @auth
                    <li><a href="{{ route('orders.index') }}" class="block bg-linear-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-medium px-4 py-2 rounded-lg transition text-center">🛒 Pesanan Saya</a></li>
                    <li><a href="{{ route('user.logout') }}" class="block bg-linear-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium px-4 py-2 rounded-lg transition text-center">← Logout</a></li>
                @else
                    <li><a href="{{ route('user.login') }}" class="block bg-purple-600 hover:bg-purple-700 text-white font-medium px-4 py-2 rounded-lg transition text-center">Login</a></li>
                    <li><a href="{{ route('user.register') }}" class="block w-full bg-yellow-400 text-black font-medium px-4 py-2 rounded-md hover:bg-yellow-300 transition text-center">Daftar</a></li>
                @endauth
            </ul>
        @endif
    </nav>
    @endif

    <style>
        .mobile-menu-transition {
            animation: slideDown 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            transform-origin: top;
        }

        .mobile-menu-transition.hidden {
            animation: slideUp 0.3s cubic-bezier(0.33, 0, 0.67, 0.33) forwards;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
                max-height: 0;
            }
            to {
                opacity: 1;
                transform: translateY(0);
                max-height: 500px;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                transform: translateY(0);
                max-height: 500px;
            }
            to {
                opacity: 0;
                transform: translateY(-15px);
                max-height: 0;
            }
        }

        /* Icon animations */
        #hamburger-icon.active {
            opacity: 0;
            scale: 0;
            rotate: -90deg;
        }

        #close-icon.active {
            opacity: 1;
            scale: 1;
            rotate: 0deg;
        }
    </style>

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');
        const navbar = document.getElementById('navbar');
        let lastScrollY = 0;

        // Hamburger menu toggle
        hamburger.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('flex');
            
            if (!isOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex', 'mobile-menu-transition');
                hamburgerIcon.classList.add('active');
                closeIcon.classList.add('active');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                hamburgerIcon.classList.remove('active');
                closeIcon.classList.remove('active');
            }
        });

        // Close mobile menu when a link is clicked
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                hamburgerIcon.classList.remove('active');
                closeIcon.classList.remove('active');
            });
        });

        // Smooth scroll for navbar links
        const scrollLinks = document.querySelectorAll('[data-scroll-to]');
        scrollLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-scroll-to');
                
                if (targetId === 'home') {
                    // Scroll to top
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    // Scroll to section
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Navbar scroll animation
        window.addEventListener('scroll', function() {
            lastScrollY = window.scrollY;

            if (lastScrollY > 100) {
                navbar.classList.add('navbar-shadow');
            } else {
                navbar.classList.remove('navbar-shadow');
            }
        });
    </script>

    <!-- Main Content -->
    @yield('content')

    {{-- footer - hanya tampil di home page --}}
    @if(request()->routeIs('home'))
        @include('user.footer')
    @endif
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
