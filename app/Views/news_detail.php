<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?><?= esc($post['title']) ?> - APTIKOM Jatim<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero / Cover -->
<div class="relative h-[480px] overflow-hidden bg-primary">
    <img src="<?= esc($post['image'] ?: 'https://images.unsplash.com/photo-1504711432869-5d39a13c3347?auto=format&fit=crop&w=1920&q=80') ?>"
        alt="<?= esc($post['title']) ?>"
        class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/60 to-transparent"></div>
    <div class="relative h-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-end pb-12">
        <a href="/news" class="inline-flex items-center gap-2 text-blue-300 hover:text-white text-sm font-bold mb-6 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Berita
        </a>
        <span class="inline-block px-4 py-1.5 bg-secondary text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full w-fit mb-4">
            <?= esc($post['category']) ?>
        </span>
        <h1 class="text-3xl md:text-5xl font-black text-white leading-tight">
            <?= esc($post['title']) ?>
        </h1>
        <div class="flex items-center gap-6 mt-6 text-blue-200 text-sm font-medium">
            <span class="flex items-center gap-2">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                <?= date('d F Y', strtotime($post['createdAt'])) ?>
            </span>
            <span class="flex items-center gap-2">
                <i data-lucide="tag" class="w-4 h-4"></i>
                <?= esc($post['category']) ?>
            </span>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-[40px] shadow-sm border border-gray-100 overflow-hidden">

            <!-- Excerpt / Lead -->
            <?php if (!empty($post['excerpt'])): ?>
                <div class="px-10 pt-10 pb-0">
                    <p class="text-xl text-gray-600 leading-relaxed font-medium border-l-4 border-secondary pl-6 italic">
                        <?= esc($post['excerpt']) ?>
                    </p>
                </div>
            <?php endif; ?>

            <!-- Article Body -->
            <article class="px-10 py-10 prose prose-lg max-w-none
                prose-headings:font-black prose-headings:text-gray-900
                prose-p:text-gray-600 prose-p:leading-relaxed
                prose-a:text-primary prose-a:font-bold
                prose-strong:text-gray-800
                prose-img:rounded-2xl prose-img:shadow-lg">
                <?= $post['content'] ?>
            </article>

            <!-- Share / Tags Footer -->
            <div class="px-10 pb-10 pt-0 border-t border-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 text-sm font-bold rounded-full">
                    <i data-lucide="tag" class="w-4 h-4"></i>
                    <?= esc($post['category']) ?>
                </span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-400 font-medium">Bagikan:</span>
                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode(current_url()) ?>"
                        target="_blank"
                        class="p-2 bg-sky-50 text-sky-500 hover:bg-sky-100 rounded-xl transition-colors">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
                        target="_blank"
                        class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-xl transition-colors">
                        <i data-lucide="facebook" class="w-4 h-4"></i>
                    </a>
                    <button onclick="navigator.clipboard.writeText('<?= current_url() ?>'); this.innerHTML='<i data-lucide=\'check\' class=\'w-4 h-4\'></i>'; lucide.createIcons();"
                        class="p-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-xl transition-colors" title="Salin tautan">
                        <i data-lucide="link" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Related Articles -->
        <?php if (!empty($related)): ?>
            <div class="mt-16">
                <h2 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                    <span class="w-1.5 h-8 bg-secondary rounded-full inline-block"></span>
                    Berita Terkait
                </h2>
                <div class="grid sm:grid-cols-3 gap-6">
                    <?php foreach ($related as $item): ?>
                        <a href="/news/read/<?= esc($item['slug'] ?: $item['id']) ?>"
                            class="group bg-white rounded-[28px] overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 flex flex-col">
                            <div class="h-40 overflow-hidden relative">
                                <img src="<?= esc($item['image'] ?: 'https://images.unsplash.com/photo-1504711432869-5d39a13c3347?auto=format&fit=crop&w=600&q=80') ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-3 left-3 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-[9px] font-black uppercase text-primary tracking-widest">
                                    <?= esc($item['category']) ?>
                                </div>
                            </div>
                            <div class="p-6 flex-grow">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                                    <?= date('d M Y', strtotime($item['createdAt'])) ?>
                                </p>
                                <h3 class="font-black text-gray-900 line-clamp-2 text-sm leading-tight group-hover:text-primary transition-colors">
                                    <?= esc($item['title']) ?>
                                </h3>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Back Button -->
        <div class="mt-12 text-center">
            <a href="/news"
                class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-2xl font-bold hover:bg-primary-hover transition-all shadow-lg">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Semua Berita
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
