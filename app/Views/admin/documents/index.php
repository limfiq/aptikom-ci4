<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Dokumen & Panduan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-8">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-gray-900">Dokumen & Panduan</h1>
            <p class="text-gray-400 text-sm mt-1">Kelola panduan, edaran, dan dokumen resmi APTIKOM Jatim.</p>
        </div>
        <button onclick="document.getElementById('modal-add').classList.remove('hidden')"
            class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:bg-primary-hover transition-all">
            <i data-lucide="plus-circle" class="w-5 h-5"></i> Tambah Dokumen
        </button>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl text-sm font-medium flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Documents Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h2 class="font-black text-gray-800">Daftar Dokumen (<?= count($documents) ?>)</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50/80 text-gray-500 uppercase tracking-wider text-xs">
                    <tr>
                        <th class="px-6 py-4 text-left font-bold">Judul Dokumen</th>
                        <th class="px-6 py-4 text-left font-bold">Kategori</th>
                        <th class="px-6 py-4 text-left font-bold">Ukuran</th>
                        <th class="px-6 py-4 text-left font-bold">Tanggal</th>
                        <th class="px-6 py-4 text-center font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if (empty($documents)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <i data-lucide="file-x" class="w-12 h-12 text-gray-200 mx-auto mb-4"></i>
                                <p class="text-gray-400 font-semibold">Belum ada dokumen. Tambah yang pertama!</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($documents as $doc): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="file-text" class="w-5 h-5 text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 line-clamp-1"><?= esc($doc['title']) ?></p>
                                            <?php if ($doc['description']): ?>
                                                <p class="text-xs text-gray-400 line-clamp-1"><?= esc($doc['description']) ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full">
                                        <?= esc($doc['category'] ?? 'Umum') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 font-medium"><?= esc($doc['size'] ?? '-') ?></td>
                                <td class="px-6 py-4 text-gray-400 text-xs font-medium"><?= date('d M Y', strtotime($doc['createdAt'])) ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <?php if ($doc['fileUrl']): ?>
                                            <a href="<?= esc($doc['fileUrl']) ?>" target="_blank"
                                                class="p-2 bg-green-50 text-green-600 rounded-xl hover:bg-green-100 transition-colors" title="Download">
                                                <i data-lucide="download" class="w-4 h-4"></i>
                                            </a>
                                        <?php endif; ?>
                                        <button onclick='openEditModal(<?= json_encode($doc) ?>)'
                                            class="p-2 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-100 transition-colors" title="Edit">
                                            <i data-lucide="pencil" class="w-4 h-4"></i>
                                        </button>
                                        <a href="/admin/documents/delete/<?= $doc['id'] ?>"
                                            onclick="return confirm('Hapus dokumen ini?')"
                                            class="p-2 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition-colors" title="Hapus">
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

<!-- Modal Add Document -->
<div id="modal-add" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-xl font-black text-gray-900">Tambah Dokumen Baru</h3>
            <button onclick="document.getElementById('modal-add').classList.add('hidden')"
                class="p-2 hover:bg-gray-100 rounded-xl transition-colors text-gray-400">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <form action="/admin/documents/store" method="POST" class="p-8 space-y-5">
            <?= csrf_field() ?>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Dokumen <span class="text-red-500">*</span></label>
                <input type="text" name="title" required placeholder="Contoh: Panduan Kurikulum OBE 2024"
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                        <option value="Panduan">Panduan</option>
                        <option value="Edaran">Edaran</option>
                        <option value="SK">SK/Surat Keputusan</option>
                        <option value="Kurikulum">Kurikulum</option>
                        <option value="Laporan">Laporan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ukuran File</label>
                    <input type="text" name="size" placeholder="Contoh: 2.4 MB"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">URL File / Link Download</label>
                <input type="url" name="fileUrl" placeholder="https://drive.google.com/..."
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="3" placeholder="Keterangan singkat isi dokumen..."
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all resize-none"></textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modal-add').classList.add('hidden')"
                    class="flex-1 border border-gray-200 text-gray-700 px-6 py-3 rounded-2xl font-bold hover:bg-gray-50 transition-all">Batal</button>
                <button type="submit"
                    class="flex-1 bg-primary text-white px-6 py-3 rounded-2xl font-bold hover:bg-primary-hover transition-all shadow-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Document -->
<div id="modal-edit" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-xl font-black text-gray-900">Edit Dokumen</h3>
            <button onclick="document.getElementById('modal-edit').classList.add('hidden')"
                class="p-2 hover:bg-gray-100 rounded-xl transition-colors text-gray-400">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <form id="edit-form" action="" method="POST" class="p-8 space-y-5">
            <?= csrf_field() ?>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Dokumen <span class="text-red-500">*</span></label>
                <input type="text" id="edit-title" name="title" required
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <select id="edit-category" name="category" class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                        <option value="Panduan">Panduan</option>
                        <option value="Edaran">Edaran</option>
                        <option value="SK">SK/Surat Keputusan</option>
                        <option value="Kurikulum">Kurikulum</option>
                        <option value="Laporan">Laporan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ukuran File</label>
                    <input type="text" id="edit-size" name="size"
                        class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">URL File / Link Download</label>
                <input type="url" id="edit-fileUrl" name="fileUrl"
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat</label>
                <textarea id="edit-description" name="description" rows="3"
                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all resize-none"></textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modal-edit').classList.add('hidden')"
                    class="flex-1 border border-gray-200 text-gray-700 px-6 py-3 rounded-2xl font-bold hover:bg-gray-50 transition-all">Batal</button>
                <button type="submit"
                    class="flex-1 bg-primary text-white px-6 py-3 rounded-2xl font-bold hover:bg-primary-hover transition-all shadow-lg">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(doc) {
    document.getElementById('edit-title').value       = doc.title ?? '';
    document.getElementById('edit-category').value    = doc.category ?? 'Panduan';
    document.getElementById('edit-size').value        = doc.size ?? '';
    document.getElementById('edit-fileUrl').value     = doc.fileUrl ?? '';
    document.getElementById('edit-description').value = doc.description ?? '';
    document.getElementById('edit-form').action       = '/admin/documents/update/' + doc.id;
    document.getElementById('modal-edit').classList.remove('hidden');
}
</script>
<?= $this->endSection() ?>
