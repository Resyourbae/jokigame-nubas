@extends('user.layout')

@section('content')

{{-- navbar --}}
<nav id="navbar" class="fixed top-0 left-0 right-0 w-full z-50 bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-3 border-b border-b-fuchsia-600 opacity-100 shadow-lg backdrop-blur-md">
  <div class="flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
      <img src="logo.png" alt="logo" class="w-13 h-13 ml-4">
      <span class="text-[#FFEE2F] font-bold italic font-display text-xl">Reszz Joki</span>
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
    <ul class="hidden lg:flex space-x-6 ml-140 text-gray-200">
      <li><a href="#" class="hover:text-yellow-400 transition">Beranda</a></li>
      <li><a href="#tentang-kami" class="hover:text-yellow-400 transition">Tentang</a></li>
      <li><a href="#layanan" class="hover:text-yellow-400 transition">Layanan</a></li>
      <li><a href="#galeri" class="hover:text-yellow-400 transition">Galeri</a></li>
      <li><a href="#kontak" class="hover:text-yellow-400 transition">Kontak</a></li>
    </ul>

    <!-- Tombol Admin Desktop -->
    <a href="{{ route('admin.login') }}" class="hidden lg:block bg-yellow-400 text-black font-medium px-4 py-1.5 rounded-md hover:bg-yellow-300 transition">
      Admin
    </a>
  </div>

  <!-- Menu Mobile -->
  <ul id="mobile-menu" class="hidden flex-col space-y-3 mt-4 text-gray-200 lg:hidden mobile-menu-transition">
    <li><a href="#" class="block hover:text-yellow-400 transition py-2">Beranda</a></li>
    <li><a href="#tentang-kami" class="block hover:text-yellow-400 transition py-2">Tentang</a></li>
    <li><a href="#layanan" class="block hover:text-yellow-400 transition py-2">Layanan</a></li>
    <li><a href="#galeri" class="block hover:text-yellow-400 transition py-2">Galeri</a></li>
    <li><a href="#kontak" class="block hover:text-yellow-400 transition py-2">Kontak</a></li>
    <li><a href="{{ route('admin.login') }}" class="block w-full bg-yellow-400 text-black font-medium px-4 py-2 rounded-md hover:bg-yellow-300 transition text-center">Admin</a></li>
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
  const navbar = document.getElementById('navbar');
  const hamburgerIcon = document.getElementById('hamburger-icon');
  const closeIcon = document.getElementById('close-icon');

  hamburger.addEventListener('click', function() {
    const isOpen = mobileMenu.classList.contains('flex');
    
    if (!isOpen) {
      // Open menu
      mobileMenu.classList.remove('hidden');
      mobileMenu.classList.add('flex', 'mobile-menu-transition');
      hamburgerIcon.classList.add('active');
      closeIcon.classList.add('active');
    } else {
      // Close menu
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

  // Navbar scroll effect - Transparent when scrolling
  let ticking = false;
  window.addEventListener('scroll', function() {
    if (!ticking) {
      window.requestAnimationFrame(function() {
        if (window.scrollY > 50) {
          navbar.style.opacity = '0.8';
          navbar.style.backdropFilter = 'blur(4px)';
          navbar.classList.remove('shadow-lg');
        } else {
          navbar.style.opacity = '1';
          navbar.style.backdropFilter = 'blur(12px)';
          navbar.classList.add('shadow-lg');
        }
        ticking = false;
      });
      ticking = true;
    }
  });
</script>

