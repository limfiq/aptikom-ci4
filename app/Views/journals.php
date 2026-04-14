<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="bg-white min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-primary mb-4">Jurnal & Publikasi</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Daftar jurnal ilmiah nasional dan internasional yang dikelola atau bekerjasama dengan APTIKOM Jatim untuk publikasi hasil riset para dosen dan peneliti.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <?php foreach($journals as $journal): ?>
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <i data-lucide="book-open" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-primary mb-1 leading-snug"><?= $journal['title'] ?></h3>
                                <p class="text-sm text-gray-500 mb-2"><?= $journal['publisher'] ?></p>
                                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-medium">
                                    <?= $journal['rank'] ?>
                                </span>
                            </div>
                        </div>
                        <a href="<?= $journal['link'] ?>" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-secondary group-hover:scale-110 transition-transform">
                            <i data-lucide="external-link" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if(empty($journals)): ?>
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Belum ada daftar jurnal yang tersedia.</p>
            </div>
        <?php endif; ?>
        
        <!-- Call to Action for Researchers -->
        <div class="mt-20 bg-primary rounded-2xl p-8 text-white relative overflow-hidden">
            <div class="absolute right-0 top-0 opacity-10">
                <i data-lucide="book-open" class="w-64 h-64 -translate-y-12 translate-x-12"></i>
            </div>
            <div class="relative z-10 max-w-2xl">
                <h2 class="text-2xl font-bold mb-4">Ingin Publikasikan Riset Anda?</h2>
                <p class="text-blue-100 mb-6">
                    APTIKOM Jatim terus mendorong peningkatan kualitas publikasi ilmiah dosen dan mahasiswa Indonesia melalui jaringan jurnal bereputasi kami.
                </p>
                <div class="flex flex-wrap gap-4">
                    <button class="bg-secondary hover:bg-secondary-hover text-white px-6 py-3 rounded-lg font-bold transition-colors">
                        Panduan Penulisan
                    </button>
                    <button class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/30 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                        Hubungi Tim Publikasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
