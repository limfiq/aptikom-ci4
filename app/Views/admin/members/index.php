<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Manajemen Anggota<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-3xl font-black text-gray-900">Anggota & Instansi</h1>
        <p class="text-gray-400 text-sm mt-1">Kelola anggota individu, instansi perguruan tinggi, dan pengurus APTIKOM Jatim.</p>
    </div>

    <!-- Flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl text-sm font-medium flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabs -->
    <div class="flex gap-2 bg-gray-100 p-1.5 rounded-2xl w-fit">
        <button id="tab-btn-individual" onclick="switchTab('individual')"
            class="tab-btn px-5 py-2.5 rounded-xl text-sm font-bold transition-all bg-primary text-white shadow-lg shadow-primary/20">
            <i data-lucide="user" class="w-4 h-4 inline mr-2"></i>Anggota Individu
        </button>
        <button id="tab-btn-institution" onclick="switchTab('institution')"
            class="tab-btn px-5 py-2.5 rounded-xl text-sm font-bold transition-all text-gray-400 hover:text-gray-600">
            <i data-lucide="building-2" class="w-4 h-4 inline mr-2"></i>Instansi / Prodi
        </button>
        <button id="tab-btn-board" onclick="switchTab('board')"
            class="tab-btn px-5 py-2.5 rounded-xl text-sm font-bold transition-all text-gray-400 hover:text-gray-600">
            <i data-lucide="award" class="w-4 h-4 inline mr-2"></i>Pengurus
        </button>
    </div>

    <!-- ─── Tab: Individual Members ──────────────────────────────── -->
    <div id="tab-content-individual" class="tab-content space-y-4">
        <div class="flex justify-between items-center bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-50 rounded-2xl text-blue-600">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-sm font-black text-gray-900">Total Anggota Individu</p>
                    <p class="text-xs text-gray-400"><?= count($id_members) ?> Orang Terdaftar</p>
                </div>
            </div>
            <a href="/admin/members/individuals/create"
                class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary/20">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Anggota
            </a>
        </div>

        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50/80 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Nama</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">NPP / Afiliasi</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Prodi / Peran</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Provinsi</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Masa Berlaku</th>
                            <th class="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php if (empty($id_members)): ?>
                            <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada anggota individu.</td></tr>
                        <?php else: ?>
                            <?php foreach ($id_members as $m): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-bold text-gray-900"><?= esc($m['name']) ?></td>
                                    <td class="px-6 py-4">
                                        <p class="text-xs font-mono text-gray-500"><?= esc($m['employeeNumber']) ?></p>
                                        <p class="text-xs text-gray-700 font-medium"><?= esc($m['affiliation']) ?></p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-xs text-gray-700"><?= esc($m['studyProgram']) ?></p>
                                        <span class="inline-block mt-1 px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded-full"><?= esc($m['role']) ?></span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-500"><?= esc($m['province']) ?></td>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-500"><?= $m['validityPeriod'] ? date('d M Y', strtotime($m['validityPeriod'])) : '-' ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="/admin/members/individuals/edit/<?= $m['id'] ?>" class="p-2 text-amber-600 hover:bg-amber-50 rounded-xl transition-colors"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                            <a href="/admin/members/individuals/delete/<?= $m['id'] ?>" onclick="return confirm('Hapus anggota ini?')" class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
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

    <!-- ─── Tab: Institutions ─────────────────────────────────────── -->
    <div id="tab-content-institution" class="tab-content space-y-4 hidden">
        <div class="flex justify-between items-center bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-purple-50 rounded-2xl text-purple-600">
                    <i data-lucide="building-2" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-sm font-black text-gray-900">Total Instansi Anggota</p>
                    <p class="text-xs text-gray-400"><?= count($inst_members) ?> Perguruan Tinggi</p>
                </div>
            </div>
            <a href="/admin/members/institutions/create"
                class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary/20">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Instansi
            </a>
        </div>
        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50/80 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Instansi</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Tipe</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Provinsi</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Website</th>
                            <th class="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php if (empty($inst_members)): ?>
                            <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">Belum ada instansi anggota.</td></tr>
                        <?php else: ?>
                            <?php foreach ($inst_members as $m): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <?php if (!empty($m['logo'])): ?>
                                                <img src="<?= esc($m['logo']) ?>" class="w-8 h-8 object-contain rounded" onerror="this.style.display='none'">
                                            <?php endif; ?>
                                            <span class="font-bold text-gray-900"><?= esc($m['name']) ?></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-bold rounded-full"><?= esc($m['type']) ?></span></td>
                                    <td class="px-6 py-4 text-xs text-gray-500"><?= esc($m['province']) ?></td>
                                    <td class="px-6 py-4 text-xs text-blue-600 hover:underline">
                                        <?php if ($m['website']): ?>
                                            <a href="<?= esc($m['website']) ?>" target="_blank"><?= parse_url($m['website'], PHP_URL_HOST) ?: $m['website'] ?></a>
                                        <?php else: ?>-<?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="/admin/members/institutions/edit/<?= $m['id'] ?>" class="p-2 text-amber-600 hover:bg-amber-50 rounded-xl transition-colors"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                            <a href="/admin/members/institutions/delete/<?= $m['id'] ?>" onclick="return confirm('Hapus instansi ini?')" class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
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

    <!-- ─── Tab: Board Members ────────────────────────────────────── -->
    <div id="tab-content-board" class="tab-content space-y-4 hidden">
        <div class="flex justify-between items-center bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-amber-50 rounded-2xl text-amber-600">
                    <i data-lucide="award" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-sm font-black text-gray-900">Total Pengurus</p>
                    <p class="text-xs text-gray-400"><?= count($board_members) ?> Pejabat Aktif</p>
                </div>
            </div>
            <a href="/admin/members/board/create"
                class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm flex items-center gap-2 shadow-lg shadow-primary/20">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Pengurus
            </a>
        </div>
        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50/80 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Pengurus</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Jabatan</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Urutan</th>
                            <th class="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php if (empty($board_members)): ?>
                            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada data pengurus.</td></tr>
                        <?php else: ?>
                            <?php foreach ($board_members as $m): ?>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gray-100 overflow-hidden flex-shrink-0 flex items-center justify-center font-black text-gray-400">
                                                <?php if (!empty($m['image'])): ?>
                                                    <img src="<?= esc($m['image']) ?>" class="w-full h-full object-cover">
                                                <?php else: ?>
                                                    <?= strtoupper(substr($m['name'], 0, 1)) ?>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-900"><?= esc($m['name']) ?></p>
                                                <?php if (!empty($m['description'])): ?>
                                                    <p class="text-xs text-gray-400 line-clamp-1"><?= esc(substr($m['description'], 0, 60)) ?>…</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-full"><?= esc($m['position']) ?></span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400 font-mono">#<?= $m['order'] ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="/admin/members/board/edit/<?= $m['id'] ?>" class="p-2 text-amber-600 hover:bg-amber-50 rounded-xl transition-colors"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                            <a href="/admin/members/board/delete/<?= $m['id'] ?>" onclick="return confirm('Hapus pengurus ini?')" class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
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
</div>

<script>
function switchTab(tabId) {
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('bg-primary', 'text-white', 'shadow-lg', 'shadow-primary/20');
        btn.classList.add('text-gray-400', 'hover:text-gray-600');
    });
    document.getElementById('tab-btn-' + tabId).classList.add('bg-primary', 'text-white', 'shadow-lg', 'shadow-primary/20');
    document.getElementById('tab-btn-' + tabId).classList.remove('text-gray-400', 'hover:text-gray-600');

    document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
    document.getElementById('tab-content-' + tabId).classList.remove('hidden');

    lucide.createIcons();
}
</script>
<?= $this->endSection() ?>
