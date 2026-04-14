<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>Berita & Pengumuman - APTIKOM Jatim<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero -->
<div class="bg-primary py-24 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1504711432869-5d39a13c3347?auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/10 text-blue-200 text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-6">Informasi Terkini</span>
        <h1 class="text-5xl font-black mb-4">Berita & Pengumuman</h1>
        <p class="text-xl opacity-80 max-w-2xl mx-auto">
            Kabar terbaru seputar kegiatan, kebijakan, dan perkembangan dunia informatika dari APTIKOM Jatim.
        </p>
    </div>
</div>

<!-- Category Filter -->
<?php if (!empty($categories)): ?>
    <div class="bg-white border-b border-gray-100 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 overflow-x-auto py-4 scrollbar-none">
                <a href="/news"
                    class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-bold transition-all <?= empty($active_cat) ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">
                    Semua
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="/news?category=<?= urlencode($cat) ?>"
                        class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-bold transition-all <?= $active_cat === $cat ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">
                        <?= esc($cat) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- News Grid -->
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($posts)): ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($posts as $post): ?>
                    <article class="group bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col">
                        <!-- Thumbnail -->
                        <a href="/news/read/<?= esc($post['slug'] ?: $post['id']) ?>" class="block h-52 overflow-hidden relative">
                            <img
                                src="<?= esc($post['image'] ?: 'https://images.unsplash.com/photo-1504711432869-5d39a13c3347?auto=format&fit=crop&w=800&q=80') ?>"
                                alt="<?= esc($post['title']) ?>"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-[10px] font-black uppercase text-primary tracking-widest">
                                <?= esc($post['category']) ?>
                            </div>
                        </a>
                        <!-- Body -->
                        <div class="p-8 flex flex-col flex-grow">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">
                                <?= date('d F Y', strtotime($post['createdAt'])) ?>
                            </p>
                            <h2 class="text-lg font-black text-gray-900 leading-tight line-clamp-2 group-hover:text-primary transition-colors mb-3">
                                <a href="/news/read/<?= esc($post['slug'] ?: $post['id']) ?>">
                                    <?= esc($post['title']) ?>
                                </a>
                            </h2>
                            <p class="text-sm text-gray-500 line-clamp-3 flex-grow leading-relaxed">
                                <?= esc($post['excerpt'] ?: strip_tags($post['content'])) ?>
                            </p>
                            <a href="/news/read/<?= esc($post['slug'] ?: $post['id']) ?>"
                                class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-primary border-b-2 border-primary/20 hover:border-primary transition-all pt-6 w-fit">
                                Baca Selengkapnya <i data-lucide="arrow-right" class="w-3 h-3"></i>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-24">
                <i data-lucide="newspaper" class="w-16 h-16 text-gray-200 mx-auto mb-6"></i>
                <h3 class="text-2xl font-black text-gray-300 mb-2">Belum Ada Berita</h3>
                <p class="text-gray-400">Konten akan segera hadir. Nantikan update dari kami.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
