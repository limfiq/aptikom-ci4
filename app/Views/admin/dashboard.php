<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Dashboard Utama<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-8 animate-in fade-in duration-700">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Dashboard</h1>
            <p class="text-gray-500 mt-1">Selamat datang kembali, Ringkasan statistik portal Anda hari ini.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-gray-700 px-5 py-2.5 rounded-2xl hover:bg-gray-50 transition-all font-bold text-sm shadow-sm flex items-center gap-2">
                <i data-lucide="download" class="w-4 h-4"></i>
                Ekspor Laporan
            </button>
            <button class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm shadow-lg shadow-primary/20 flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Tambah Konten
            </button>
        </div>
    </div>

    <!-- KPI Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: News -->
        <div class="bg-emerald-50 rounded-3xl p-6 shadow-sm border border-emerald-100/50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-white rounded-2xl text-emerald-600 shadow-sm group-hover:scale-110 transition-transform">
                    <i data-lucide="newspaper" class="w-6 h-6"></i>
                </div>
                <div class="flex items-center gap-1 text-emerald-600 text-xs font-bold bg-emerald-100 px-2 py-1 rounded-full">
                    <i data-lucide="trending-up" class="w-3 h-3"></i>
                    +12.5%
                </div>
            </div>
            <p class="text-emerald-800/60 text-xs font-bold uppercase tracking-widest">Total Berita</p>
            <h3 class="text-3xl font-black text-emerald-900 mt-1"><?= $stats['posts'] ?></h3>
            <div class="mt-4 w-full bg-emerald-200/50 h-1 rounded-full overflow-hidden">
                <div class="bg-emerald-500 h-full w-2/3"></div>
            </div>
        </div>

        <!-- Card 2: Events -->
        <div class="bg-purple-50 rounded-3xl p-6 shadow-sm border border-purple-100/50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-white rounded-2xl text-purple-600 shadow-sm group-hover:scale-110 transition-transform">
                    <i data-lucide="calendar" class="w-6 h-6"></i>
                </div>
                <div class="flex items-center gap-1 text-purple-600 text-xs font-bold bg-purple-100 px-2 py-1 rounded-full">
                    <i data-lucide="trending-up" class="w-3 h-3"></i>
                    +8.2%
                </div>
            </div>
            <p class="text-purple-800/60 text-xs font-bold uppercase tracking-widest">Kegiatan</p>
            <h3 class="text-3xl font-black text-purple-900 mt-1"><?= $stats['events'] ?></h3>
            <div class="mt-4 w-full bg-purple-200/50 h-1 rounded-full overflow-hidden">
                <div class="bg-purple-500 h-full w-1/3"></div>
            </div>
        </div>

        <!-- Card 3: Members -->
        <div class="bg-blue-50 rounded-3xl p-6 shadow-sm border border-blue-100/50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-white rounded-2xl text-blue-600 shadow-sm group-hover:scale-110 transition-transform">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <div class="flex items-center gap-1 text-blue-600 text-xs font-bold bg-blue-100 px-2 py-1 rounded-full">
                    <i data-lucide="trending-up" class="w-3 h-3"></i>
                    +15.7%
                </div>
            </div>
            <p class="text-blue-800/60 text-xs font-bold uppercase tracking-widest">Total Anggota</p>
            <h3 class="text-3xl font-black text-blue-900 mt-1"><?= $stats['members'] ?></h3>
            <div class="mt-4 w-full bg-blue-200/50 h-1 rounded-full overflow-hidden">
                <div class="bg-blue-500 h-full w-3/4"></div>
            </div>
        </div>

        <!-- Card 4: Messages -->
        <div class="bg-orange-50 rounded-3xl p-6 shadow-sm border border-orange-100/50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-white rounded-2xl text-orange-600 shadow-sm group-hover:scale-110 transition-transform">
                    <i data-lucide="message-circle" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-black text-orange-600 bg-orange-100 px-2 py-1 rounded-full uppercase tracking-tighter">Unread</span>
            </div>
            <p class="text-orange-800/60 text-xs font-bold uppercase tracking-widest">Pesan Baru</p>
            <h3 class="text-3xl font-black text-orange-900 mt-1"><?= $stats['messages'] ?></h3>
            <div class="mt-4 w-full bg-orange-200/50 h-1 rounded-full overflow-hidden">
                <div class="bg-orange-500 h-full w-1/4"></div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Sales Overview (Growth) -->
        <div class="lg:col-span-2 bg-white rounded-[32px] shadow-xl shadow-gray-200/50 p-8 border border-gray-100">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-black text-gray-900 text-lg flex items-center gap-2">
                    <i data-lucide="line-chart" class="w-5 h-5 text-primary"></i>
                    Ikhtisar Pertumbuhan
                </h3>
                <div class="flex gap-2">
                    <span class="px-3 py-1 bg-gray-50 text-gray-500 text-[10px] font-bold rounded-full border border-gray-100">7 Hari Terakhir</span>
                </div>
            </div>
            <div class="relative h-64 w-full group">
                <svg viewBox="0 0 500 200" class="w-full h-full preserve-3d">
                    <defs>
                        <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:0.2" />
                            <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:0" />
                        </linearGradient>
                    </defs>
                    <!-- Grid Lines -->
                    <line x1="0" y1="40" x2="500" y2="40" stroke="#f1f5f9" stroke-width="1" />
                    <line x1="0" y1="80" x2="500" y2="80" stroke="#f1f5f9" stroke-width="1" />
                    <line x1="0" y1="120" x2="500" y2="120" stroke="#f1f5f9" stroke-width="1" />
                    <line x1="0" y1="160" x2="500" y2="160" stroke="#f1f5f9" stroke-width="1" />
                    
                    <!-- Data Area -->
                    <path d="M0,160 Q50,140 100,150 T200,80 T300,100 T400,40 T500,60 V200 H0 Z" fill="url(#chartGradient)" />
                    <!-- Data Line -->
                    <path d="M0,160 Q50,140 100,150 T200,80 T300,100 T400,40 T500,60" fill="none" stroke="#3b82f6" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="drop-shadow-lg" />
                    
                    <!-- Interactive Dots -->
                    <circle cx="200" cy="80" r="6" fill="#3b82f6" stroke="#fff" stroke-width="2" class="cursor-pointer" />
                    <circle cx="400" cy="40" r="6" fill="#3b82f6" stroke="#fff" stroke-width="2" class="cursor-pointer" />
                </svg>
            </div>
            <div class="flex justify-between mt-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest px-2">
                <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
            </div>
        </div>

        <!-- Traffic Sources (Donut) -->
        <div class="bg-white rounded-[32px] shadow-xl shadow-gray-200/50 p-8 border border-gray-100 flex flex-col">
            <h3 class="font-black text-gray-900 text-lg mb-8 flex items-center gap-2">
                <i data-lucide="pie-chart" class="w-5 h-5 text-secondary"></i>
                Sumber Trafik
            </h3>
            <div class="relative flex-grow flex items-center justify-center mb-8">
                <svg width="180" height="180" viewBox="0 0 100 100" class="transform -rotate-90">
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#e2e8f0" stroke-width="12" />
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#3b82f6" stroke-width="12" stroke-dasharray="251.2" stroke-dashoffset="188.4" stroke-linecap="round" />
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#f59e0b" stroke-width="12" stroke-dasharray="251.2" stroke-dashoffset="213.5" stroke-linecap="round" transform="rotate(25 50 50)" />
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-2xl font-black text-gray-900">84%</span>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Organic</span>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between text-xs font-bold">
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div> Direktori Anggota
                    </div>
                    <span class="text-gray-900">45%</span>
                </div>
                <div class="flex items-center justify-between text-xs font-bold">
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-3 h-3 bg-amber-500 rounded-full"></div> Portal Berita
                    </div>
                    <span class="text-gray-900">30%</span>
                </div>
                <div class="flex items-center justify-between text-xs font-bold">
                    <div class="flex items-center gap-2 text-gray-600">
                        <div class="w-3 h-3 bg-gray-200 rounded-full"></div> Lainnya
                    </div>
                    <span class="text-gray-900">25%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity & Lists -->
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Recent Activity Feed -->
        <div class="bg-white rounded-[32px] shadow-sm p-8 border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-black text-gray-900 text-lg">Aktivitas Terkini</h3>
                <a href="#" class="text-xs font-bold text-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-6">
                <?php foreach ($recentActivity as $activity): ?>
                <div class="flex gap-4 group">
                    <div class="text-2xl w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center group-hover:bg-primary/5 transition-colors">
                        <?= $activity['icon'] ?>
                    </div>
                    <div class="flex-1 border-b border-gray-50 pb-4 group-last:border-0">
                        <p class="font-bold text-gray-900 text-sm"><?= $activity['title'] ?></p>
                        <p class="text-xs text-gray-500 mt-0.5"><?= $activity['description'] ?></p>
                        <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase tracking-widest"><?= $activity['time'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Top Focus Items -->
        <div class="bg-white rounded-[32px] shadow-sm p-8 border border-gray-100">
            <h3 class="font-black text-gray-900 text-lg mb-6">Fokus Utama</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left border-b border-gray-50">
                            <th class="pb-4 text-gray-400 font-bold text-[10px] uppercase tracking-widest">Aktivitas/Event</th>
                            <th class="pb-4 text-right text-gray-400 font-bold text-[10px] uppercase tracking-widest">Partisipan</th>
                            <th class="pb-4 text-center text-gray-400 font-bold text-[10px] uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php foreach ($topItems as $item): ?>
                        <tr class="group hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 font-bold text-gray-900"><?= $item['name'] ?></td>
                            <td class="py-4 text-right font-medium text-gray-600"><?= $item['value'] ?></td>
                            <td class="py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter
                                    <?= $item['status'] == 'active' ? 'bg-green-100 text-green-700' : 
                                       ($item['status'] == 'completed' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700') ?>">
                                    <?= $item['status'] ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
