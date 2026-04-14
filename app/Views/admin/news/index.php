<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Manajemen Berita<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-black text-gray-900">Manajemen Berita</h1>
            <p class="text-sm text-gray-500">Kelola semua artikel, berita, dan pengumuman portal.</p>
        </div>
        <a href="/admin/news/create" class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm shadow-lg shadow-primary/20 flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Tambah Berita
        </a>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-2xl text-sm font-bold flex items-center gap-3 animate-in fade-in slide-in-from-top-4">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Berita</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Kategori</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Tanggal</th>
                        <th class="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if (empty($posts)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">Belum ada berita yang tersedia.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($posts as $post): ?>
                        <tr class="group hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0">
                                        <?php if ($post['image']): ?>
                                            <img src="<?= $post['image'] ?>" class="w-full h-full object-cover" alt="">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                <i data-lucide="image" class="w-5 h-5"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900 line-clamp-1"><?= $post['title'] ?></p>
                                        <p class="text-xs text-gray-400 mt-0.5 line-clamp-1"><?= strip_tags($post['content']) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter
                                    <?= $post['category'] == 'news' ? 'bg-blue-100 text-blue-700' : 
                                       ($post['category'] == 'announcement' ? 'bg-amber-100 text-amber-700' : 'bg-purple-100 text-purple-700') ?>">
                                    <?= $post['category'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-gray-500">
                                <?= date('d M Y', strtotime($post['createdAt'])) ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="/admin/news/edit/<?= $post['id'] ?>" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <a href="/admin/news/delete/<?= $post['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
