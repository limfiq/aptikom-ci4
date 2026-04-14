<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>Kegiatan APTIKOM Jatim<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero -->
<div class="bg-primary py-24 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920')] bg-cover bg-center"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/10 text-blue-200 text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-6">Kalender Kegiatan</span>
        <h1 class="text-5xl font-black mb-4">Kegiatan APTIKOM Jatim</h1>
        <p class="text-xl opacity-80 max-w-2xl mx-auto">Seminar, konferensi, pelatihan, dan workshop yang diselenggarakan oleh APTIKOM Jatim Jawa Timur.</p>
    </div>
</div>

<!-- Filter Tabs -->
<?php if (!empty($types)): ?>
    <div class="bg-white border-b border-gray-100 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 overflow-x-auto py-4 scrollbar-none">
                <a href="/events" class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-bold transition-all <?= empty($active_type) ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">Semua</a>
                <?php foreach ($types as $t): ?>
                    <a href="/events?type=<?= urlencode($t) ?>" class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-bold transition-all <?= $active_type === $t ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>"><?= esc($t) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Events Grid -->
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (empty($events)): ?>
            <div class="text-center py-24">
                <i data-lucide="calendar-x" class="w-16 h-16 text-gray-200 mx-auto mb-4"></i>
                <h3 class="text-2xl font-black text-gray-300 mb-2">Belum Ada Kegiatan</h3>
                <p class="text-gray-400">Kegiatan akan segera hadir. Nantikan update dari kami.</p>
            </div>
        <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($events as $ev): ?>
                    <a href="/events/<?= $ev['id'] ?>" class="group bg-white rounded-[32px] shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500 overflow-hidden flex flex-col">
                        <!-- Date Banner -->
                        <div class="bg-primary px-8 py-5 flex items-center gap-5">
                            <div class="text-center flex-shrink-0">
                                <p class="text-4xl font-black text-white leading-none"><?= date('d', strtotime($ev['date'])) ?></p>
                                <p class="text-blue-300 text-xs font-black uppercase tracking-widest"><?= date('M Y', strtotime($ev['date'])) ?></p>
                            </div>
                            <div>
                                <span class="inline-block px-3 py-1 bg-white/20 text-white text-[10px] font-black uppercase tracking-widest rounded-full"><?= esc($ev['type']) ?></span>
                                <p class="text-white/70 text-xs mt-1.5 flex items-center gap-1.5">
                                    <i data-lucide="map-pin" class="w-3 h-3 flex-shrink-0"></i>
                                    <?= esc($ev['location']) ?>
                                </p>
                            </div>
                        </div>
                        <!-- Body -->
                        <div class="p-8 flex-grow flex flex-col">
                            <h2 class="font-black text-gray-900 text-lg leading-tight group-hover:text-primary transition-colors mb-4 flex-grow">
                                <?= esc($ev['title']) ?>
                            </h2>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400 flex items-center gap-1.5">
                                    <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                    <?= date('d M Y', strtotime($ev['date'])) ?>
                                </span>
                                <span class="text-xs font-black text-primary flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Lihat Detail <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
