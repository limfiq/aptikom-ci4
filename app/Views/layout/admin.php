<?php
// Sidebar unread count — available on every admin page
$_unreadMessages = (new \App\Models\ContactMessageModel())->where('isRead', 0)->countAllResults();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - APTIKOM Jatim Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E3A8A',
                        'primary-hover': '#1E40AF',
                        secondary: '#F59E0B',
                        'secondary-hover': '#D97706',
                    }
                }
            }
        }
    </script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans flex text-gray-900">
    
    <!-- Desktop Sidebar -->
    <aside class="hidden lg:flex flex-col w-72 flex-shrink-0 bg-primary text-white sticky top-0 h-screen shadow-2xl z-50 overflow-y-auto">
        <div class="p-6 flex items-center gap-3 border-b border-white/10">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center flex-shrink-0 overflow-hidden shadow">
                <img src="/logo.png" alt="APTIKOM Jatim" class="w-full h-full object-contain p-1"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                <span style="display:none" class="text-primary font-black text-xs">APT</span>
            </div>
            <div>
                <h1 class="text-sm font-black tracking-tight leading-none">APTIKOM Jatim</h1>
                <p class="text-blue-300 text-[10px] font-medium mt-0.5">Admin Portal</p>
            </div>
        </div>
        
        <nav class="flex-grow p-6 space-y-2">
            <div class="text-xs font-semibold text-blue-300 uppercase tracking-widest mb-4 px-4 opacity-70">Menu Utama</div>
            
            <a href="/admin" class="flex items-center px-4 py-3.5 <?= (url_is('admin') || url_is('admin/')) ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= (url_is('admin') || url_is('admin/')) ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Dashboard</span>
            </a>
            
            <a href="/admin/news" class="flex items-center px-4 py-3.5 <?= url_is('admin/news*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="newspaper" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/news*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Kelola Berita</span>
            </a>
            
             <a href="/admin/events" class="flex items-center px-4 py-3.5 <?= url_is('admin/events*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="calendar" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/events*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Kelola Kegiatan</span>
            </a>
 
            <a href="/admin/documents" class="flex items-center px-4 py-3.5 <?= url_is('admin/documents*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="file-text" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/documents*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Dokumen & Panduan</span>
            </a>
 
            <div class="pt-6 pb-2 text-xs font-semibold text-blue-300 uppercase tracking-widest px-4 opacity-70">Organisasi</div>
            
            <a href="/admin/members" class="flex items-center px-4 py-3.5 <?= url_is('admin/members*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="users" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/members*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Anggota & Instansi</span>
            </a>
            
            <a href="/admin/partners" class="flex items-center px-4 py-3.5 <?= url_is('admin/partners*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="building-2" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/partners*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Mitra Kerjasama</span>
            </a>

            <a href="/admin/achievements" class="flex items-center px-4 py-3.5 <?= url_is('admin/achievements*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="award" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/achievements*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Prestasi</span>
            </a>

            <a href="/admin/banners" class="flex items-center px-4 py-3.5 <?= url_is('admin/banners*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="image" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/banners*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Banner Slider</span>
            </a>
 
            <div class="pt-6 pb-2 text-xs font-semibold text-blue-300 uppercase tracking-widest px-4 opacity-70">Kontak & Sistem</div>

            <a href="/admin/messages" class="flex items-center px-4 py-3.5 <?= url_is('admin/messages*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="inbox" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/messages*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm flex-grow">Pesan Masuk</span>
                <?php if ($_unreadMessages > 0): ?>
                    <span class="ml-auto bg-red-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full min-w-[20px] text-center">
                        <?= $_unreadMessages ?>
                    </span>
                <?php endif; ?>
            </a>

            <a href="/admin/event-registrations" class="flex items-center px-4 py-3.5 <?= url_is('admin/event-registrations*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="clipboard-list" class="w-5 h-5 mr-4 group-hover:scale-110 transition-transform <?= url_is('admin/event-registrations*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Pendaftaran</span>
            </a>

            <a href="/admin/profile" class="flex items-center px-4 py-3.5 <?= url_is('admin/profile*') ? 'bg-white/10 shadow-inner text-white' : 'hover:bg-white/5 text-blue-100' ?> rounded-2xl transition-all group">
                <i data-lucide="settings" class="w-5 h-5 mr-4 group-hover:rotate-45 transition-transform <?= url_is('admin/profile*') ? 'text-white' : 'text-blue-300' ?>"></i>
                <span class="font-medium text-sm">Pengaturan Situs</span>
            </a>
        </nav>
    </aside>

    <!-- Mobile Header -->
    <div class="lg:hidden fixed top-0 left-0 right-0 bg-primary text-white p-4 flex justify-between items-center z-[60] shadow-lg">
        <h1 class="font-bold">APTIKOM Jatim Admin</h1>
        <button id="mobile-menu-btn" class="p-2 bg-white/10 rounded-lg">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0">
        <!-- Top Navigation -->
        <header class="hidden lg:flex h-20 items-center justify-between px-10 bg-white border-b border-gray-100 sticky top-0 z-40">
            <div class="flex items-center max-w-xl w-full">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i data-lucide="search" class="w-5 h-5"></i>
                    </span>
                    <input type="text" placeholder="Cari konten, anggota, atau berita..." class="w-full bg-gray-50 border-0 rounded-2xl pl-12 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/10 transition-all outline-none">
                </div>
            </div>
            
            <div class="flex items-center space-x-6">
                <!-- Notifications -->
                <button class="relative p-2.5 bg-gray-50 hover:bg-gray-100 rounded-2xl text-gray-500 transition-all">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                
                <div class="h-8 w-px bg-gray-200"></div>
                
                <!-- Admin Profile Dropdown -->
                <div class="relative" id="profile-dropdown-wrapper">
                    <button id="profile-dropdown-btn"
                        class="flex items-center space-x-4 group focus:outline-none"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-900 leading-none"><?= session()->get('adminName') ?></p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1"><?= session()->get('adminRole') ?></p>
                        </div>
                        <div class="w-12 h-12 bg-primary rounded-2xl shadow-lg flex items-center justify-center text-white font-black text-lg border-2 border-white group-hover:rotate-6 transition-transform">
                            <?= strtoupper(substr(session()->get('adminName'), 0, 1)) ?>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400 group-hover:text-gray-600 transition-colors"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profile-dropdown-menu"
                        class="hidden absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50 animate-in fade-in slide-in-from-top-2 duration-150">
                        <div class="px-4 py-3 border-b border-gray-50 mb-1">
                            <p class="text-xs font-black text-gray-900"><?= session()->get('adminName') ?></p>
                            <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-0.5"><?= session()->get('adminRole') ?></p>
                        </div>
                        <a href="/admin/profile"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                            <i data-lucide="user" class="w-4 h-4 text-gray-400"></i>
                            Pengaturan Profil
                        </a>
                        <a href="/admin"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                            <i data-lucide="layout-dashboard" class="w-4 h-4 text-gray-400"></i>
                            Dashboard
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="/admin/logout"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            Keluar
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Section -->
        <div class="flex-grow p-6 lg:p-10 mt-16 lg:mt-0">
            <?= $this->renderSection('content') ?>
        </div>

        <footer class="p-6 lg:px-10 py-6 border-t border-gray-100 text-center lg:text-left flex flex-col lg:flex-row justify-between items-center text-xs text-gray-400 gap-4">
            <p>&copy; <?= date('Y') ?> APTIKOM Jatim Portal. Dikelola oleh Sekretariat APTIKOM Jatim.</p>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-primary transition-colors">Panduan Sistem</a>
                <a href="#" class="hover:text-primary transition-colors">Bantuan</a>
            </div>
        </footer>
    </div>

    <!-- Initialization Scripts -->
    <script>
        lucide.createIcons();
        
        // Mobile Sidebar Toggle (Placeholder)
        const menuBtn = document.getElementById('mobile-menu-btn');
        if (menuBtn) {
            menuBtn.onclick = () => alert('Mobile Sidebar Coming Soon!');
        }

        // Profile Dropdown Toggle
        const dropBtn  = document.getElementById('profile-dropdown-btn');
        const dropMenu = document.getElementById('profile-dropdown-menu');
        if (dropBtn && dropMenu) {
            dropBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = !dropMenu.classList.contains('hidden');
                dropMenu.classList.toggle('hidden', isOpen);
                dropBtn.setAttribute('aria-expanded', String(!isOpen));
            });
            // Close when clicking outside
            document.addEventListener('click', () => {
                dropMenu.classList.add('hidden');
                dropBtn.setAttribute('aria-expanded', 'false');
            });
        }
    </script>
</body>
</html>
