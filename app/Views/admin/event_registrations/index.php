<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Pendaftaran Kegiatan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-black text-gray-900">Pendaftaran Kegiatan</h1>
        <p class="text-sm text-gray-400 mt-1">Pantau peserta yang mendaftar di setiap kegiatan APTIKOM Jatim.</p>
    </div>

    <?php if (empty($events)): ?>
        <div class="text-center py-24 bg-white rounded-[32px] border border-gray-100">
            <i data-lucide="calendar-x" class="w-16 h-16 text-gray-200 mx-auto mb-4"></i>
            <p class="text-gray-300 font-black text-xl">Belum Ada Kegiatan</p>
        </div>
    <?php else: ?>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php foreach ($events as $ev): ?>
                <div class="bg-white rounded-[28px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-primary to-blue-700 p-6 flex items-center gap-4">
                        <div class="bg-white/20 rounded-2xl p-3 text-center flex-shrink-0">
                            <p class="text-2xl font-black text-white leading-none"><?= date('d', strtotime($ev['date'])) ?></p>
                            <p class="text-blue-200 text-[9px] font-black uppercase"><?= date('M Y', strtotime($ev['date'])) ?></p>
                        </div>
                        <div class="min-w-0">
                            <span class="inline-block px-2 py-0.5 bg-white/20 text-blue-100 text-[9px] font-black uppercase tracking-widest rounded-full mb-1"><?= esc($ev['type']) ?></span>
                            <p class="font-black text-white text-sm leading-tight line-clamp-2"><?= esc($ev['title']) ?></p>
                        </div>
                    </div>
                    <!-- Stats & Action -->
                    <div class="p-6 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center">
                                <i data-lucide="users" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <p class="text-3xl font-black text-gray-900 leading-none"><?= $ev['total_reg'] ?></p>
                                <p class="text-xs text-gray-400 font-medium">Pendaftar</p>
                            </div>
                        </div>
                        <a href="/admin/event-registrations/<?= $ev['id'] ?>/participants"
                            class="bg-primary text-white px-5 py-2.5 rounded-2xl font-bold text-sm hover:bg-primary-hover transition-all flex items-center gap-2 shadow-lg shadow-primary/20">
                            Lihat <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
