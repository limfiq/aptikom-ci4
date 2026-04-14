<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 max-w-4xl mx-auto animate-in fade-in duration-500">
    <div class="flex items-center gap-4">
        <a href="/admin/news" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-400 hover:text-primary transition-all">
            <i data-lucide="chevron-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-2xl font-black text-gray-900"><?= $title ?></h1>
            <p class="text-xs text-gray-500 italic uppercase tracking-widest font-bold">Portal News Management</p>
        </div>
    </div>

    <div class="bg-white rounded-[32px] shadow-xl shadow-gray-200/50 p-8 border border-gray-100">
        <form action="<?= isset($post) ? '/admin/news/update/'.$post['id'] : '/admin/news/store' ?>" method="post" class="space-y-8">
            <?= csrf_field() ?>

            <!-- Title Input -->
            <div class="space-y-3">
                <label for="title" class="text-sm font-black text-gray-900">Judul Berita</label>
                <input type="text" name="title" id="title" value="<?= old('title', $post['title'] ?? '') ?>" 
                       class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all font-medium text-gray-900" 
                       placeholder="Masukkan judul berita yang menarik..." required>
                <?php if (isset(session('errors')['title'])): ?>
                    <p class="text-red-500 text-xs font-bold pl-2 italic"><?= session('errors')['title'] ?></p>
                <?php endif; ?>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Category Select -->
                <div class="space-y-3">
                    <label for="category" class="text-sm font-black text-gray-900">Kategori</label>
                    <select name="category" id="category" 
                            class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all font-medium text-gray-900 appearance-none cursor-pointer">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat ?>" <?= old('category', $post['category'] ?? '') == $cat ? 'selected' : '' ?>>
                                <?= ucfirst($cat) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Image URL Input -->
                <div class="space-y-3">
                    <label for="image" class="text-sm font-black text-gray-900">Thumbnail URL</label>
                    <input type="text" name="image" id="image" value="<?= old('image', $post['image'] ?? '') ?>" 
                           class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all font-medium text-gray-900" 
                           placeholder="https://example.com/image.jpg">
                </div>
            </div>

            <!-- Content Area -->
            <div class="space-y-3">
                <label for="content" class="text-sm font-black text-gray-900">Konten Berita</label>
                <textarea name="content" id="content" rows="12" 
                          class="w-full bg-gray-50 border border-gray-100 rounded-3xl px-6 py-6 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all font-medium text-gray-900 leading-relaxed" 
                          placeholder="Tuliskan isi berita selengkap mungkin..."><?= old('content', $post['content'] ?? '') ?></textarea>
                <?php if (isset(session('errors')['content'])): ?>
                    <p class="text-red-500 text-xs font-bold pl-2 italic"><?= session('errors')['content'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 pt-6">
                <button type="submit" class="flex-1 bg-primary text-white px-8 py-5 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20 flex items-center justify-center gap-3">
                    <i data-lucide="<?= isset($post) ? 'save' : 'plus' ?>" class="w-5 h-5"></i>
                    <?= isset($post) ? 'Perbarui Berita' : 'Terbitkan Berita Sekarang' ?>
                </button>
                <a href="/admin/news" class="flex-1 bg-white border-2 border-gray-50 text-gray-400 px-8 py-5 rounded-3xl hover:bg-gray-50 hover:text-gray-600 transition-all font-black text-sm flex items-center justify-center gap-3">
                    Batalkan
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
