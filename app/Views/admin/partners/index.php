<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Manajemen Mitra<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-black text-gray-900">Mitra Kerjasama</h1>
            <p class="text-sm text-gray-400 mt-1">Kelola daftar partner dan mitra strategis APTIKOM Jatim.</p>
        </div>
        <button onclick="document.getElementById('addModal').classList.remove('hidden')"
            class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary/20">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Mitra
        </button>
    </div>

    <!-- Flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl text-sm font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Partners Grid -->
    <?php if (empty($partners)): ?>
        <div class="text-center py-24 bg-white rounded-[32px] border border-gray-100">
            <i data-lucide="handshake" class="w-16 h-16 text-gray-200 mx-auto mb-4"></i>
            <p class="text-gray-300 font-black text-xl">Belum Ada Mitra</p>
            <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Mitra" untuk menambahkan mitra baru.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            <?php foreach ($partners as $p): ?>
                <div class="group relative bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col items-center text-center <?= empty($p['isActive']) ? 'opacity-50' : '' ?>">
                    <!-- Actions overlay -->
                    <div class="absolute top-4 right-4 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity z-10">
                        <button onclick='editPartner(<?= htmlspecialchars(json_encode($p), ENT_QUOTES) ?>)'
                            class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg">
                            <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                        </button>
                        <a href="/admin/partners/delete/<?= $p['id'] ?>"
                            onclick="return confirm('Hapus mitra <?= esc($p['name']) ?>?')"
                            class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg">
                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>

                    <!-- Status badge -->
                    <?php if (empty($p['isActive'])): ?>
                        <span class="absolute top-3 left-3 px-2 py-0.5 bg-red-50 text-red-400 text-[9px] font-black rounded-full uppercase tracking-widest">Nonaktif</span>
                    <?php endif; ?>

                    <!-- Logo -->
                    <div class="w-20 h-20 mb-4 flex items-center justify-center grayscale group-hover:grayscale-0 transition-all opacity-60 group-hover:opacity-100">
                        <?php if (!empty($p['logo'])): ?>
                            <img src="<?= esc($p['logo']) ?>" alt="<?= esc($p['name']) ?>"
                                class="max-w-full max-h-full object-contain"
                                onerror="this.outerHTML='<i data-lucide=\'building-2\' class=\'w-10 h-10 text-gray-200\'></i>'">
                        <?php else: ?>
                            <i data-lucide="building-2" class="w-10 h-10 text-gray-200"></i>
                        <?php endif; ?>
                    </div>

                    <h3 class="font-bold text-gray-900 text-sm leading-tight"><?= esc($p['name']) ?></h3>

                    <?php if (!empty($p['website'])): ?>
                        <a href="<?= esc($p['website']) ?>" target="_blank"
                            class="mt-2 text-[10px] text-primary hover:underline flex items-center gap-1 font-black uppercase tracking-widest">
                            Website <i data-lucide="external-link" class="w-3 h-3"></i>
                        </a>
                    <?php endif; ?>

                    <p class="text-[9px] text-gray-300 mt-2 font-mono">#<?= $p['displayOrder'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- ─── Add Modal ──────────────────────────────────────────────────── -->
<div id="addModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[40px] shadow-2xl w-full max-w-lg overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
            <h2 class="text-xl font-black text-gray-900">Tambah Mitra Baru</h2>
            <button onclick="document.getElementById('addModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <form action="/admin/partners/store" method="post" class="p-8 space-y-5">
            <?= csrf_field() ?>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Nama Mitra <span class="text-red-400">*</span></label>
                <input type="text" name="name" required
                    class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm"
                    placeholder="Contoh: PT. Teknologi Indonesia">
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Website URL</label>
                <input type="url" name="website"
                    class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm"
                    placeholder="https://...">
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Logo URL</label>
                <input type="url" name="logo"
                    class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm"
                    placeholder="https://...">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Urutan</label>
                    <input type="number" name="displayOrder" value="0" min="0"
                        class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Status</label>
                    <select name="isActive"
                        class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                class="w-full bg-primary text-white py-4 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">
                Simpan Mitra
            </button>
        </form>
    </div>
</div>

<!-- ─── Edit Modal ─────────────────────────────────────────────────── -->
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-[40px] shadow-2xl w-full max-w-lg overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
            <h2 class="text-xl font-black text-gray-900">Edit Mitra</h2>
            <button onclick="document.getElementById('editModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <form id="editForm" method="post" class="p-8 space-y-5">
            <?= csrf_field() ?>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Nama Mitra <span class="text-red-400">*</span></label>
                <input type="text" name="name" id="edit_name" required
                    class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Website URL</label>
                <input type="url" name="website" id="edit_website"
                    class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Logo URL</label>
                <input type="url" name="logo" id="edit_logo"
                    class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Urutan</label>
                    <input type="number" name="displayOrder" id="edit_order" min="0"
                        class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Status</label>
                    <select name="isActive" id="edit_status"
                        class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-sm">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                class="w-full bg-primary text-white py-4 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<script>
function editPartner(p) {
    document.getElementById('editForm').action = '/admin/partners/update/' + p.id;
    document.getElementById('edit_name').value    = p.name    || '';
    document.getElementById('edit_website').value = p.website || '';
    document.getElementById('edit_logo').value    = p.logo    || '';
    document.getElementById('edit_order').value   = p.displayOrder || 0;
    document.getElementById('edit_status').value  = p.isActive != null ? p.isActive : 1;
    document.getElementById('editModal').classList.remove('hidden');
    lucide.createIcons();
}
</script>
<?= $this->endSection() ?>
