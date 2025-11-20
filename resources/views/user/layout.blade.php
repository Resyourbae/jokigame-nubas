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
    <nav id="navbar" class="fixed top-0 left-0 right-0 w-full z-50 bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-4 border-b border-b-fuchsia-600 opacity-100 shadow-lg backdrop-blur-md">
        <div class="flex items-center justify-between gap-6">
            <!-- Logo -->
            <div class="flex items-center gap-2 shrink-0">
                <img src="/logo.png" alt="logo" class="w-10 h-10">
                <span class="text-[#FFEE2F] font-bold italic font-display text-lg whitespace-nowrap">Reszz Joki</span>
            </div>

            <!-- Hamburger Menu (Mobile) -->
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

            <!-- Menu Desktop -->
            <ul class="hidden lg:flex space-x-8 text-gray-200 flex-1 justify-center">
                <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition" data-scroll-to="home">Beranda</a></li>
                <li><a href="{{ route('home') }}#tentang-kami" class="hover:text-yellow-400 transition" data-scroll-to="tentang-kami">Tentang</a></li>
                <li><a href="{{ route('home') }}#layanan" class="hover:text-yellow-400 transition" data-scroll-to="layanan">Layanan</a></li>
                <li><a href="{{ route('home') }}#galeri" class="hover:text-yellow-400 transition" data-scroll-to="galeri">Galeri</a></li>
                <li><a href="{{ route('home') }}#kontak" class="hover:text-yellow-400 transition" data-scroll-to="kontak">Kontak</a></li>
            </ul>

            <!-- User Menu Desktop -->
            @auth
                <div class="hidden lg:flex items-center gap-4 shrink-0">
                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center justify-center w-10 h-10 rounded-full bg-purple-600 hover:bg-purple-700 text-white font-bold transition text-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-gray-900 border border-purple-600 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <a href="{{ route('user.logout') }}" class="block px-4 py-3 text-gray-300 hover:bg-red-600 hover:text-white rounded-lg transition">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Login/Register Buttons Desktop -->
                <div class="hidden lg:flex items-center gap-3 shrink-0">
                    <a href="{{ route('user.login') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-5 py-2 rounded-md transition">
                        Login
                    </a>
                    <a href="{{ route('user.register') }}" class="bg-yellow-400 hover:bg-yellow-300 text-black font-medium px-5 py-2 rounded-md transition">
                        Daftar
                    </a>
                </div>
            @endauth
        </div>

        <!-- Menu Mobile -->
        <ul id="mobile-menu" class="hidden flex-col space-y-3 mt-4 text-gray-200 lg:hidden mobile-menu-transition">
            <li><a href="{{ route('home') }}" class="block hover:text-yellow-400 transition py-2" data-scroll-to="home">Beranda</a></li>
            <li><a href="{{ route('home') }}#tentang-kami" class="block hover:text-yellow-400 transition py-2" data-scroll-to="tentang-kami">Tentang</a></li>
            <li><a href="{{ route('home') }}#layanan" class="block hover:text-yellow-400 transition py-2" data-scroll-to="layanan">Layanan</a></li>
            <li><a href="{{ route('home') }}#galeri" class="block hover:text-yellow-400 transition py-2" data-scroll-to="galeri">Galeri</a></li>
            <li><a href="{{ route('home') }}#kontak" class="block hover:text-yellow-400 transition py-2" data-scroll-to="kontak">Kontak</a></li>
            @auth
                <li><a href="{{ route('user.logout') }}" class="block bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-md transition text-center">Logout</a></li>
            @else
                <li><a href="{{ route('user.login') }}" class="block bg-purple-600 hover:bg-purple-700 text-white font-medium px-4 py-2 rounded-md transition text-center">Login</a></li>
                <li><a href="{{ route('user.register') }}" class="block w-full bg-yellow-400 text-black font-medium px-4 py-2 rounded-md hover:bg-yellow-300 transition text-center">Daftar</a></li>
            @endauth
        </ul>
    </nav>

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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
