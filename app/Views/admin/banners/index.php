<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Manajemen Banner<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 animate-in fade-in duration-700">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-black text-gray-900">Manajemen Banner</h1>
            <p class="text-sm text-gray-500">Kelola slider utama yang muncul di beranda portal.</p>
        </div>
        <button onclick="document.getElementById('addBannerModal').classList.remove('hidden')" class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary/20">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Banner
        </button>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-2xl text-sm font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="grid gap-6">
        <?php foreach($banners as $b): ?>
        <div class="group bg-white rounded-[32px] border border-gray-100 shadow-sm hover:shadow-xl transition-all overflow-hidden flex flex-col md:flex-row shadow-sm">
            <div class="w-full md:w-64 h-48 md:h-auto bg-gray-100 relative overflow-hidden">
                <?php if ($b['backgroundImage']): ?>
                    <img src="<?= $b['backgroundImage'] ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                        <i data-lucide="image" class="w-12 h-12"></i>
                    </div>
                <?php endif; ?>
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-white/90 shadow-sm <?= $b['isActive'] ? 'text-emerald-600' : 'text-gray-400' ?>">
                        <?= $b['isActive'] ? 'Aktif' : 'Non-Aktif' ?>
                    </span>
                </div>
            </div>
            
            <div class="flex-grow p-8 flex flex-col justify-center">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] mb-1">Urutan: <?= $b['order'] ?></p>
                        <h3 class="text-xl font-black text-gray-900 leading-tight"><?= $b['title'] ?></h3>
                    </div>
                    <div class="flex gap-1">
                        <button onclick="editBanner(<?= htmlspecialchars(json_encode($b)) ?>)" class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition-all"><i data-lucide="edit-3" class="w-5 h-5"></i></button>
                        <a href="/admin/banners/delete/<?= $b['id'] ?>" onclick="return confirm('Hapus banner ini?')" class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition-all"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                    </div>
                </div>
                <p class="text-sm text-gray-500 line-clamp-2 italic"><?= $b['subtitle'] ?></p>
                <?php if ($b['buttonText']): ?>
                    <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-xl text-[10px] font-black uppercase tracking-widest text-gray-400 border border-gray-100">
                        <i data-lucide="mouse-pointer-2" class="w-3 h-3"></i> <?= $b['buttonText'] ?>: <?= $b['buttonLink'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Add Modal -->
<div id="addBannerModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[40px] shadow-2xl w-full max-w-2xl overflow-hidden animate-in zoom-in duration-300">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
            <h2 class="text-xl font-black text-gray-900">Tambah Banner Baru</h2>
            <button onclick="document.getElementById('addBannerModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <form action="/admin/banners/store" method="post" class="p-8 space-y-6">
            <?= csrf_field() ?>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Judul Utama</label>
                    <input type="text" name="title" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Urutan Tampil</label>
                    <input type="number" name="order" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" value="0">
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Sub-judul / Deskripsi Pendek</label>
                <textarea name="subtitle" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold h-24" required></textarea>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Teks Tombol (Optional)</label>
                    <input type="text" name="buttonText" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Link Tombol (Optional)</label>
                    <input type="url" name="buttonLink" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Background Image URL</label>
                <input type="text" name="backgroundImage" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="isActive" id="isActive" class="w-6 h-6 rounded-lg text-primary focus:ring-primary/20 border-gray-200" checked>
                <label for="isActive" class="text-sm font-bold text-gray-700">Aktifkan Banner Ini</label>
            </div>
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-grow bg-primary text-white py-4 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">Simpan Banner</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editBannerModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[40px] shadow-2xl w-full max-w-2xl overflow-hidden animate-in zoom-in duration-300">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
            <h2 class="text-xl font-black text-gray-900">Edit Banner</h2>
            <button onclick="document.getElementById('editBannerModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <form id="editForm" method="post" class="p-8 space-y-6">
            <?= csrf_field() ?>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Judul Utama</label>
                    <input type="text" name="title" id="edit_title" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Urutan Tampil</label>
                    <input type="number" name="order" id="edit_order" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Sub-judul / Deskripsi Pendek</label>
                <textarea name="subtitle" id="edit_subtitle" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold h-24" required></textarea>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Teks Tombol</label>
                    <input type="text" name="buttonText" id="edit_buttonText" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Link Tombol</label>
                    <input type="url" name="buttonLink" id="edit_buttonLink" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Background Image URL</label>
                <input type="text" name="backgroundImage" id="edit_backgroundImage" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
            </div>
            <div class="flex items-center gap-3">
                <input type="checkbox" name="isActive" id="edit_isActive" class="w-6 h-6 rounded-lg text-primary focus:ring-primary/20 border-gray-200">
                <label for="edit_isActive" class="text-sm font-bold text-gray-700">Aktifkan Banner Ini</label>
            </div>
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-grow bg-primary text-white py-4 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function editBanner(banner) {
        document.getElementById('editForm').action = '/admin/banners/update/' + banner.id;
        document.getElementById('edit_title').value = banner.title;
        document.getElementById('edit_order').value = banner.order;
        document.getElementById('edit_subtitle').value = banner.subtitle;
        document.getElementById('edit_buttonText').value = banner.buttonText || '';
        document.getElementById('edit_buttonLink').value = banner.buttonLink || '';
        document.getElementById('edit_backgroundImage').value = banner.backgroundImage || '';
        document.getElementById('edit_isActive').checked = banner.isActive == 1;
        document.getElementById('editBannerModal').classList.remove('hidden');
        lucide.createIcons();
    }
</script>
<?= $this->endSection() ?>
