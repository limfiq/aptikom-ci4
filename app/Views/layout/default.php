<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>APTIKOM Jatim - Asosiasi Pendidikan Tinggi Informatika dan Komputer</title>
        <link rel="icon" type="image/webp" href="/logo2.webp">
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#1E3A8A', // Custom dark blue for primary
                            'primary-hover': '#1E40AF',
                            secondary: '#F59E0B', // Amber color for secondary
                            'secondary-hover': '#D97706',
                        }
                    }
                }
            }
        </script>
        <!-- Lucide Icons -->
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>

    <body class="bg-white min-h-screen font-sans">
        <div class="flex flex-col min-h-screen">

            <!-- Actual Navbar Ported from Next.js -->
            <nav id="main-nav" class="sticky top-0 z-50 shadow-md transition-all duration-300 bg-primary">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-20">
                        <div class="flex items-center">
                            <a href="/" class="flex items-center group">
                                <div
                                    class="w-12 h-12 bg-white rounded-xl flex items-center justify-center overflow-hidden shadow-lg group-hover:scale-105 transition-transform duration-300">
                                    <img src="/logo3.png" alt="APTIKOM Jatim Logo"
                                        class="w-full h-full object-contain p-2"
                                        onerror="this.onerror=null; this.src='https://aptikom-jatim.id/img/logo-aptikom.png'">
                                </div>
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-6">
                                <a href="/"
                                    class="text-gray-300 hover:text-secondary px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                    Home
                                </a>

                                <!-- Profil Dropdown Group -->
                                <div class="relative group">
                                    <button
                                        class="text-gray-300 hover:text-secondary px-3 py-2 rounded-md text-sm font-medium transition-colors inline-flex items-center">
                                        Profil
                                    </button>
                                    <div
                                        class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50">
                                        <div class="py-1">
                                            <a href="/about"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tentang
                                                Kami</a>
                                            <a href="/management"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Susunan
                                                Pengurus</a>
                                            <a href="/institusi"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Anggota
                                                Instansi</a>
                                            <a href="/individu"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Anggota
                                                Individu</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Publikasi Dropdown Group -->
                                <div class="relative group">
                                    <button
                                        class="text-gray-300 hover:text-secondary px-3 py-2 rounded-md text-sm font-medium transition-colors inline-flex items-center">
                                        Publikasi
                                    </button>
                                    <div
                                        class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50">
                                        <div class="py-1">
                                            <a href="/news"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Berita</a>
                                            <a href="/journals"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Jurnal</a>
                                            <a href="/documents"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Panduan
                                                & Edaran</a>
                                        </div>
                                    </div>
                                </div>

                                <a href="/events"
                                    class="text-gray-300 hover:text-secondary px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                    Kegiatan
                                </a>
                                <a href="/contact"
                                    class="text-gray-300 hover:text-secondary px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                    Kontak
                                </a>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <a href="https://dias.aptikom.org/" target="_blank"
                                class="bg-secondary hover:bg-secondary-hover text-white px-5 py-2 rounded-full font-medium transition-colors">
                                Gabung Anggota
                            </a>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                                class="bg-primary inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                                <span class="sr-only">Open main menu</span>
                                <i data-lucide="menu" class="block h-6 w-6"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-primary border-t border-gray-700">
                        <a href="/"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                        <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Profil</div>
                        <a href="/about"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Tentang
                            Kami</a>
                        <a href="/management"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Susunan
                            Pengurus</a>
                        <a href="/institusi"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Anggota
                            Instansi</a>
                        <a href="/individu"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Anggota
                            Individu</a>

                        <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mt-2">
                            Publikasi</div>
                        <a href="/news"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Berita</a>
                        <a href="/journals"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Jurnal</a>
                        <a href="/documents"
                            class="text-gray-300 hover:text-white block px-3 py-1 rounded-md text-base font-medium pl-6">Panduan
                            & Edaran</a>

                        <a href="/events"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium mt-2">Kegiatan</a>
                        <a href="/contact"
                            class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
                        <a href="https://dias.aptikom.org/" target="_blank"
                            class="bg-secondary text-white block px-3 py-2 rounded-md text-base font-medium mt-4 text-center">Gabung
                            Anggota</a>
                    </div>
                </div>
            </nav>

            <script>
                // Sticky Navbar Background Scroll listener ported from useEffect()
                window.addEventListener('scroll', function () {
                    var nav = document.getElementById('main-nav');
                    if (window.scrollY > 0) {
                        nav.classList.add('bg-primary/95', 'backdrop-blur-sm');
                        nav.classList.remove('bg-primary');
                    } else {
                        nav.classList.add('bg-primary');
                        nav.classList.remove('bg-primary/95', 'backdrop-blur-sm');
                    }
                });
            </script>

            <!-- Main Content Render Section -->
            <main class="flex-grow">
                <?= $this->renderSection('content') ?>
            </main>

            <footer class="bg-primary text-gray-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                        <!-- Column 1: Organization Info -->
                        <div class="col-span-1">
                            <h3 class="text-white text-xl font-bold mb-6 tracking-wider">
                                <?= $profile['officeName'] ?? 'APTIKOM Jatim' ?>
                            </h3>
                            <img src="/logo.png" alt="Logo APTIKOM Jatim" class="h-12 mb-6 opacity-90">
                            <p class="text-sm leading-relaxed mb-6">
                                Asosiasi Pendidikan Tinggi Informatika dan Komputer. Mewujudkan pendidikan tinggi
                                komputer yang berkualitas dan berdaya saing global.
                            </p>
                            <div class="flex space-x-4">
                                <?= view_cell('App\Cells\FooterCell::social') ?>
                            </div>
                        </div>

                        <!-- Column 2: Quick Links -->
                        <div>
                            <h3 class="text-white text-lg font-bold mb-6 border-b border-white/10 pb-2 inline-block">
                                Tautan Cepat</h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="/"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Beranda</a>
                                </li>
                                <li><a href="/about"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Tentang
                                        Kami</a></li>
                                <li><a href="/news"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Berita
                                        Terkini</a></li>
                                <li><a href="/events"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Agenda
                                        Kegiatan</a></li>
                                <li><a href="/contact"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Hubungi
                                        Kami</a></li>
                            </ul>
                        </div>

                        <!-- Column 3: Keanggotaan -->
                        <div>
                            <h3 class="text-white text-lg font-bold mb-6 border-b border-white/10 pb-2 inline-block">
                                Keanggotaan</h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="/institusi"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Direktori
                                        Institusi</a></li>
                                <li><a href="/individu"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Direktori
                                        Individu</a></li>
                                <li><a href="https://dias.aptikom.org/" target="_blank"
                                        class="hover:text-secondary transition-colors transition-all duration-200">Portal
                                        DIAS</a></li>
                            </ul>
                        </div>

                        <!-- Column 4: Contact -->
                        <div>
                            <h3 class="text-white text-lg font-bold mb-6 border-b border-white/10 pb-2 inline-block">
                                Kontak</h3>
                            <?= view_cell('App\Cells\FooterCell::address') ?>
                        </div>
                    </div>
                </div>
                <div class="bg-[#15233b] py-6">
                    <div
                        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-xs text-gray-500 tracking-wider">
                        &copy; <?= date('Y') ?> APTIKOM Jatim. All rights reserved.
                    </div>
                </div>
            </footer>
        </div>

        <script>
            // Initialize Lucide Icons
            lucide.createIcons();
        </script>
    </body>

</html>