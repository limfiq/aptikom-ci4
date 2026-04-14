<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?><?= esc($event['title']) ?> - Kegiatan APTIKOM Jatim<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Back & Breadcrumb -->
<div class="bg-white border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center gap-3 text-sm text-gray-400">
        <a href="/" class="hover:text-primary transition-colors">Beranda</a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <a href="/events" class="hover:text-primary transition-colors">Kegiatan</a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <span class="text-gray-700 font-medium line-clamp-1 max-w-xs"><?= esc($event['title']) ?></span>
    </div>
</div>

<div class="bg-gray-50 py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10">

            <!-- ── Main Content ── -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Header -->
                    <div class="bg-gradient-to-br from-primary to-blue-700 p-10 text-white">
                        <span class="inline-block px-4 py-1.5 bg-white/20 text-blue-100 text-[10px] font-black uppercase tracking-widest rounded-full mb-5"><?= esc($event['type']) ?></span>
                        <h1 class="text-3xl font-black leading-tight mb-6"><?= esc($event['title']) ?></h1>
                        <div class="flex flex-wrap gap-5">
                            <div class="flex items-center gap-2 text-blue-200 text-sm">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span><?= date('l, d F Y', strtotime($event['date'])) ?></span>
                            </div>
                            <div class="flex items-center gap-2 text-blue-200 text-sm">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                <span><?= esc($event['location']) ?></span>
                            </div>
                            <div class="flex items-center gap-2 text-blue-200 text-sm">
                                <i data-lucide="users" class="w-4 h-4"></i>
                                <span><?= $totalReg ?> Pendaftar</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="p-10">
                        <h2 class="text-lg font-black text-gray-900 mb-5 flex items-center gap-3">
                            <span class="w-1 h-6 bg-primary rounded-full inline-block"></span>
                            Tentang Kegiatan
                        </h2>
                        <div class="prose prose-blue max-w-none text-gray-600 leading-relaxed whitespace-pre-line text-sm">
                            <?= esc($event['description']) ?>
                        </div>

                        <?php if (!empty($event['link']) && $event['link'] !== '#'): ?>
                            <a href="<?= esc($event['link']) ?>" target="_blank"
                                class="mt-8 inline-flex items-center gap-2 text-primary text-sm font-bold hover:underline">
                                <i data-lucide="external-link" class="w-4 h-4"></i>
                                Kunjungi Website Resmi
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ── Sidebar ── -->
            <div class="space-y-6">
                <!-- Register CTA -->
                <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                    <div class="bg-gradient-to-br from-amber-400 to-orange-500 p-6 text-white text-center">
                        <i data-lucide="ticket" class="w-10 h-10 mx-auto mb-3 opacity-90"></i>
                        <p class="font-black text-lg">Daftar Sekarang</p>
                        <p class="text-orange-100 text-xs mt-1">Tempat terbatas, segera daftarkan diri Anda!</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Total Pendaftar</span>
                            <span class="font-black text-gray-900"><?= $totalReg ?> orang</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Tanggal</span>
                            <span class="font-bold text-gray-900"><?= date('d M Y', strtotime($event['date'])) ?></span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Lokasi</span>
                            <span class="font-bold text-gray-900 text-right max-w-[140px] leading-tight"><?= esc($event['location']) ?></span>
                        </div>

                        <a href="/events/<?= $event['id'] ?>/register"
                            class="block w-full mt-4 bg-gradient-to-r from-primary to-blue-600 text-white text-center py-4 rounded-2xl font-black text-sm hover:shadow-xl hover:shadow-primary/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i data-lucide="user-plus" class="w-4 h-4"></i>
                            Daftar Kegiatan Ini
                        </a>
                    </div>
                </div>

                <!-- Share -->
                <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Bagikan</p>
                    <div class="flex gap-3">
                        <a href="https://wa.me/?text=<?= urlencode($event['title'] . ' - ' . current_url()) ?>" target="_blank"
                            class="flex-1 bg-green-50 text-green-600 hover:bg-green-100 py-3 rounded-2xl text-xs font-bold flex items-center justify-center gap-2 transition-colors">
                            <i data-lucide="message-circle" class="w-4 h-4"></i> WhatsApp
                        </a>
                        <button onclick="navigator.share ? navigator.share({title:'<?= esc(addslashes($event['title'])) ?>',url:location.href}) : navigator.clipboard.writeText(location.href).then(()=>alert('Link disalin!'))"
                            class="flex-1 bg-gray-100 text-gray-600 hover:bg-gray-200 py-3 rounded-2xl text-xs font-bold flex items-center justify-center gap-2 transition-colors">
                            <i data-lucide="link" class="w-4 h-4"></i> Salin Link
                        </button>
                    </div>
                </div>

                <!-- Back -->
                <a href="/events" class="flex items-center gap-2 text-gray-400 hover:text-primary text-sm font-bold transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Daftar Kegiatan
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
