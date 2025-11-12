@extends('user.layout')

@section('content')

{{-- navbar --}}
<nav class="fixed top-0 left-0 right-0 w-full z-50 bg-linear-to-r from-ungutuwak to-unguagakmuda px-6 py-3 border-b border-b-fuchsia-600">
  <div class="flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
      <img src="logo.png" alt="logo" class="w-13 h-13 ml-4">
      <span class="text-[#FFEE2F] font-bold italic font-display text-xl">Reszz Joki</span>
    </div>

    <!-- Hamburger Menu (Mobile) -->
    <button id="hamburger" class="lg:hidden flex flex-col gap-1 cursor-pointer">
      <span class="w-6 h-0.5 bg-white block transition-all"></span>
      <span class="w-6 h-0.5 bg-white block transition-all"></span>
      <span class="w-6 h-0.5 bg-white block transition-all"></span>
    </button>

    <!-- Menu Desktop -->
    <ul class="hidden lg:flex space-x-6 ml-140 text-gray-200">
      <li><a href="#" class="hover:text-yellow-400 transition">Beranda</a></li>
      <li><a href="#" class="hover:text-yellow-400 transition">Tentang</a></li>
      <li><a href="#" class="hover:text-yellow-400 transition">Layanan</a></li>
      <li><a href="#" class="hover:text-yellow-400 transition">Galeri</a></li>
      <li><a href="#" class="hover:text-yellow-400 transition">Kontak</a></li>
    </ul>

    <!-- Tombol Admin Desktop -->
    <button class="hidden lg:block bg-yellow-400 text-black font-medium px-4 py-1.5 rounded-md hover:bg-yellow-300 transition">
      Admin
    </button>
  </div>

  <!-- Menu Mobile -->
  <ul id="mobile-menu" class="hidden flex-col space-y-3 mt-4 text-gray-200 lg:hidden">
    <li><a href="#" class="block hover:text-yellow-400 transition py-2">Beranda</a></li>
    <li><a href="#" class="block hover:text-yellow-400 transition py-2">Tentang</a></li>
    <li><a href="#" class="block hover:text-yellow-400 transition py-2">Layanan</a></li>
    <li><a href="#" class="block hover:text-yellow-400 transition py-2">Galeri</a></li>
    <li><a href="#" class="block hover:text-yellow-400 transition py-2">Kontak</a></li>
    <li><button class="w-full bg-yellow-400 text-black font-medium px-4 py-2 rounded-md hover:bg-yellow-300 transition">Admin</button></li>
  </ul>
</nav>

<script>
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobile-menu');

  hamburger.addEventListener('click', function() {
    mobileMenu.classList.toggle('hidden');
    mobileMenu.classList.toggle('flex');
  });
</script>

