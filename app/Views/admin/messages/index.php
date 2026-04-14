<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Pesan Masuk<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-black text-gray-900">Pesan Masuk</h1>
            <p class="text-sm text-gray-400 mt-1">
                <?= $unread ?> pesan belum dibaca dari total <?= count($messages) ?> pesan.
            </p>
        </div>
        <?php if ($unread > 0): ?>
            <a href="/admin/messages/mark-all-read"
                class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-2xl transition-all font-bold text-sm flex items-center gap-2">
                <i data-lucide="check-check" class="w-4 h-4"></i> Tandai Semua Dibaca
            </a>
        <?php endif; ?>
    </div>

    <!-- Flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl text-sm font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Messages List -->
    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
        <?php if (empty($messages)): ?>
            <div class="text-center py-24">
                <i data-lucide="inbox" class="w-16 h-16 text-gray-200 mx-auto mb-4"></i>
                <p class="text-gray-300 font-black text-xl">Tidak Ada Pesan</p>
                <p class="text-gray-400 text-sm mt-1">Belum ada pesan masuk dari form kontak.</p>
            </div>
        <?php else: ?>
            <ul class="divide-y divide-gray-50">
                <?php foreach ($messages as $msg): ?>
                    <li class="flex items-start gap-5 px-8 py-5 hover:bg-gray-50/60 transition-colors <?= empty($msg['isRead']) ? 'bg-blue-50/30' : '' ?>">
                        <!-- Avatar -->
                        <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-black text-sm flex-shrink-0 mt-0.5">
                            <?= strtoupper(substr($msg['name'], 0, 1)) ?>
                        </div>

                        <!-- Content -->
                        <div class="flex-grow min-w-0">
                            <div class="flex items-center gap-3 mb-1">
                                <span class="font-black text-gray-900 text-sm"><?= esc($msg['name']) ?></span>
                                <?php if (empty($msg['isRead'])): ?>
                                    <span class="px-2 py-0.5 bg-blue-100 text-blue-600 text-[9px] font-black rounded-full uppercase tracking-widest">Baru</span>
                                <?php endif; ?>
                                <span class="ml-auto text-[10px] text-gray-400 whitespace-nowrap"><?= date('d M Y, H:i', strtotime($msg['createdAt'])) ?></span>
                            </div>
                            <p class="text-xs text-gray-500 mb-1"><?= esc($msg['email']) ?> — <span class="font-bold text-gray-700"><?= esc($msg['subject']) ?></span></p>
                            <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed"><?= esc($msg['message']) ?></p>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2 flex-shrink-0 mt-1">
                            <a href="/admin/messages/read/<?= $msg['id'] ?>"
                                class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-colors" title="Lihat Detail">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </a>
                            <a href="mailto:<?= esc($msg['email']) ?>"
                                class="p-2 text-green-600 hover:bg-green-50 rounded-xl transition-colors" title="Balas via Email">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </a>
                            <a href="/admin/messages/delete/<?= $msg['id'] ?>"
                                onclick="return confirm('Hapus pesan dari <?= esc(addslashes($msg['name'])) ?>?')"
                                class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors" title="Hapus">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
