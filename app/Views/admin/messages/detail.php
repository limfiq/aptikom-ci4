<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Detail Pesan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-2xl space-y-6">
    <div class="flex items-center gap-4">
        <a href="/admin/messages" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-colors">
            <i data-lucide="arrow-left" class="w-5 h-5"></i>
        </a>
        <h1 class="text-2xl font-black text-gray-900">Detail Pesan</h1>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
        <!-- Sender Info -->
        <div class="p-8 border-b border-gray-50 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-primary/10 text-primary flex items-center justify-center font-black text-xl flex-shrink-0">
                <?= strtoupper(substr($msg['name'], 0, 1)) ?>
            </div>
            <div>
                <p class="font-black text-gray-900 text-lg"><?= esc($msg['name']) ?></p>
                <a href="mailto:<?= esc($msg['email']) ?>" class="text-sm text-primary hover:underline"><?= esc($msg['email']) ?></a>
                <p class="text-xs text-gray-400 mt-1"><?= date('l, d F Y — H:i', strtotime($msg['createdAt'])) ?> WIB</p>
            </div>
        </div>

        <!-- Subject & Body -->
        <div class="p-8">
            <p class="text-xs font-black uppercase tracking-widest text-gray-400 mb-1">Subjek</p>
            <p class="text-lg font-bold text-gray-900 mb-6"><?= esc($msg['subject']) ?></p>

            <p class="text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Pesan</p>
            <div class="bg-gray-50 rounded-2xl p-6 text-sm text-gray-700 leading-relaxed whitespace-pre-wrap">
                <?= esc($msg['message']) ?>
            </div>
        </div>

        <!-- Actions -->
        <div class="px-8 pb-8 flex gap-4">
            <a href="mailto:<?= esc($msg['email']) ?>?subject=Re: <?= urlencode($msg['subject']) ?>"
                class="flex-grow bg-primary text-white py-3.5 rounded-2xl font-black text-sm flex items-center justify-center gap-2 hover:bg-primary-hover transition-all shadow-lg shadow-primary/20">
                <i data-lucide="reply" class="w-4 h-4"></i> Balas via Email
            </a>
            <a href="/admin/messages/delete/<?= $msg['id'] ?>"
                onclick="return confirm('Hapus pesan ini?')"
                class="px-6 py-3.5 bg-red-50 text-red-500 rounded-2xl font-bold text-sm flex items-center gap-2 hover:bg-red-100 transition-all">
                <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
