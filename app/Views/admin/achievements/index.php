<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Manajemen Prestasi<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 animate-in fade-in duration-700">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-black text-gray-900">Manajemen Prestasi</h1>
            <p class="text-sm text-gray-500">Kelola daftar penghargaan dan pencapaian organisasi.</p>
        </div>
        <button onclick="document.getElementById('addAchievementModal').classList.remove('hidden')" class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary/20">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Prestasi
        </button>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-2xl text-sm font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach($achievements as $a): ?>
        <div class="group bg-white rounded-[40px] border border-gray-100 shadow-sm hover:shadow-xl transition-all overflow-hidden flex flex-col">
            <div class="h-48 bg-gray-100 relative overflow-hidden">
                <?php if ($a['image']): ?>
                    <img src="<?= $a['image'] ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-gray-200">
                        <i data-lucide="award" class="w-16 h-16"></i>
                    </div>
                <?php endif; ?>
                <div class="absolute top-4 right-4 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button onclick="editAchievement(<?= htmlspecialchars(json_encode($a)) ?>)" class="p-2 bg-white/90 backdrop-blur-sm text-blue-600 rounded-xl shadow-sm hover:bg-white"><i data-lucide="edit-3" class="w-4 h-4"></i></button>
                    <a href="/admin/achievements/delete/<?= $a['id'] ?>" onclick="return confirm('Hapus prestasi ini?')" class="p-2 bg-white/90 backdrop-blur-sm text-red-600 rounded-xl shadow-sm hover:bg-white"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
                </div>
                <div class="absolute bottom-4 left-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-gray-900/50 backdrop-blur-sm text-white border border-white/20">
                        <?= $a['category'] ?: 'Umum' ?>
                    </span>
                </div>
            </div>
            
            <div class="p-8 flex-grow">
                <p class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] mb-2"><?= date('d M Y', strtotime($a['date'])) ?></p>
                <h3 class="text-lg font-black text-gray-900 leading-tight mb-3 line-clamp-2"><?= $a['title'] ?></h3>
                <p class="text-sm text-gray-500 line-clamp-3 leading-relaxed"><?= $a['description'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Add Modal -->
<div id="addAchievementModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[40px] shadow-2xl w-full max-w-2xl overflow-hidden animate-in zoom-in duration-300 max-h-[90vh] overflow-y-auto">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50 sticky top-0 z-10 backdrop-blur-md">
            <h2 class="text-xl font-black text-gray-900">Tambah Prestasi</h2>
            <button onclick="document.getElementById('addAchievementModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <form action="/admin/achievements/store" method="post" class="p-8 space-y-6">
            <?= csrf_field() ?>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Judul Prestasi</label>
                    <input type="text" name="title" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Tanggal Pencapaian</label>
                    <input type="date" name="date" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Kategori</label>
                <input type="text" name="category" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: Internasional, Nasional">
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Deskripsi</label>
                <textarea name="description" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold h-32"></textarea>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Gambar / Foto URL</label>
                <input type="text" name="image" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
            </div>
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-grow bg-primary text-white py-4 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">Simpan Prestasi</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editAchievementModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[40px] shadow-2xl w-full max-w-2xl overflow-hidden animate-in zoom-in duration-300 max-h-[90vh] overflow-y-auto">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50 sticky top-0 z-10 backdrop-blur-md">
            <h2 class="text-xl font-black text-gray-900">Edit Prestasi</h2>
            <button onclick="document.getElementById('editAchievementModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        <form id="editForm" method="post" class="p-8 space-y-6">
            <?= csrf_field() ?>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Judul Prestasi</label>
                    <input type="text" name="title" id="edit_title" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Tanggal Pencapaian</label>
                    <input type="date" name="date" id="edit_date" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Kategori</label>
                <input type="text" name="category" id="edit_category" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Deskripsi</label>
                <textarea name="description" id="edit_description" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold h-32"></textarea>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Gambar / Foto URL</label>
                <input type="text" name="image" id="edit_image" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
            </div>
            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-grow bg-primary text-white py-4 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function editAchievement(ach) {
        document.getElementById('editForm').action = '/admin/achievements/update/' + ach.id;
        document.getElementById('edit_title').value = ach.title;
        document.getElementById('edit_date').value = ach.date ? ach.date.split(' ')[0] : '';
        document.getElementById('edit_category').value = ach.category || '';
        document.getElementById('edit_description').value = ach.description || '';
        document.getElementById('edit_image').value = ach.image || '';
        document.getElementById('editAchievementModal').classList.remove('hidden');
        lucide.createIcons();
    }
</script>
<?= $this->endSection() ?>
