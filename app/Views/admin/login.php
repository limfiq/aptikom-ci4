<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - APTIKOM Jatim</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E3A8A',
                        secondary: '#F59E0B',
                    }
                }
            }
        }
    </script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 font-sans">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-primary p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <i data-lucide="shield-lock" class="w-48 h-48 -translate-x-12 translate-y-8"></i>
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg overflow-hidden">
                        <img src="/logo.png" alt="APTIKOM Jatim" class="w-full h-full object-contain p-2"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                        <span style="display:none" class="text-primary font-black text-xs">APT</span>
                    </div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">APTIKOM Jatim Admin</h1>
                    <p class="text-blue-100 text-sm mt-1">Masuk ke panel administrasi</p>
                </div>
            </div>

            <div class="p-8">
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center text-red-600 text-sm animate-pulse">
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-3 flex-shrink-0"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center text-green-600 text-sm">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-3 flex-shrink-0"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/login') ?>" method="post" class="space-y-6">
                    <?= csrf_field() ?>
                    
                    <div>
                        <label for="username" class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
                                <i data-lucide="user" class="w-5 h-5"></i>
                            </span>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                required
                                class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-gray-300"
                                placeholder="Username"
                                value="<?= old('username') ?>"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
                                <i data-lucide="lock" class="w-5 h-5"></i>
                            </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all placeholder:text-gray-300"
                                placeholder="••••••••"
                            />
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-primary hover:bg-primary-hover text-white font-bold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg shadow-primary/20 flex items-center justify-center group"
                    >
                        Masuk Sekarang
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    
                    <div class="text-center mt-6">
                        <a href="/" class="text-sm text-gray-500 hover:text-primary transition-colors">
                            Kembali ke Beranda
                        </a>
                    </div>
                </form>
            </div>
            
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-400">&copy; <?= date('Y') ?> APTIKOM Jatim. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Lucide Script -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
