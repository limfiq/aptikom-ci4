<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>Pendaftaran Berhasil<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-gray-50 flex items-center justify-center py-20 px-4">
    <div class="max-w-lg w-full">
        <!-- Success Card -->
        <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden text-center">
            <!-- Top Decoration -->
            <div class="bg-gradient-to-br from-green-400 to-emerald-600 px-10 py-12">
                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                    <i data-lucide="check-circle-2" class="w-14 h-14 text-white"></i>
                </div>
                <h1 class="text-3xl font-black text-white">Pendaftaran Berhasil!</h1>
                <p class="text-green-100 mt-2 text-sm">Terima kasih telah mendaftar.</p>
            </div>

            <!-- Info -->
            <div class="p-10 space-y-6">
                <?php if ($reg_name): ?>
                    <p class="text-gray-700 leading-relaxed text-sm">
                        Halo, <strong class="text-gray-900 font-black text-base"><?= esc($reg_name) ?></strong>! 🎉<br>
                        Pendaftaran Anda untuk kegiatan:
                    </p>
                    <div class="bg-blue-50 border border-blue-100 rounded-2xl px-6 py-4">
                        <p class="font-black text-primary text-base leading-tight"><?= esc($reg_event) ?></p>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        telah <strong class="text-green-600">berhasil dikirimkan</strong> dan sedang dalam 
                        <strong>proses konfirmasi</strong> oleh panitia. Konfirmasi akan dikirimkan melalui email yang Anda daftarkan.
                    </p>
                <?php else: ?>
                    <p class="text-gray-600">Pendaftaran Anda telah berhasil diterima dan akan segera dikonfirmasi.</p>
                <?php endif; ?>

                <!-- Checklist -->
                <div class="text-left space-y-3 bg-gray-50 rounded-2xl p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3">Yang perlu Anda lakukan selanjutnya:</p>
                    <div class="flex items-start gap-3 text-sm text-gray-600">
                        <i data-lucide="mail" class="w-4 h-4 text-primary flex-shrink-0 mt-0.5"></i>
                        Periksa email untuk konfirmasi pendaftaran dari panitia
                    </div>
                    <div class="flex items-start gap-3 text-sm text-gray-600">
                        <i data-lucide="calendar" class="w-4 h-4 text-primary flex-shrink-0 mt-0.5"></i>
                        Catat tanggal kegiatan agar tidak terlewat
                    </div>
                    <div class="flex items-start gap-3 text-sm text-gray-600">
                        <i data-lucide="bell" class="w-4 h-4 text-primary flex-shrink-0 mt-0.5"></i>
                        Pantau email Anda untuk info lebih lanjut dari panitia
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <a href="/events" class="flex-1 border-2 border-gray-200 text-gray-600 py-3.5 rounded-2xl font-bold text-sm hover:border-primary hover:text-primary transition-all text-center">
                        ← Kegiatan Lain
                    </a>
                    <a href="/" class="flex-1 bg-primary text-white py-3.5 rounded-2xl font-black text-sm hover:bg-primary-hover transition-all shadow-lg shadow-primary/20 text-center">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

        <!-- No Index / Prevent re-register confusion -->
        <p class="text-center text-gray-400 text-xs mt-6">Jika ada pertanyaan, hubungi kami melalui halaman <a href="/contact" class="text-primary hover:underline">Kontak</a>.</p>
    </div>
</div>

<?= $this->endSection() ?>
