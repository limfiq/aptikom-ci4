<?= $this->extend('layout/admin') ?>
<?= $this->section('title') ?>Peserta Kegiatan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Back & Header -->
    <div class="flex items-start gap-4">
        <a href="/admin/event-registrations" class="p-2.5 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors mt-1 flex-shrink-0">
            <i data-lucide="arrow-left" class="w-5 h-5 text-gray-600"></i>
        </a>
        <div>
            <h1 class="text-2xl font-black text-gray-900 leading-tight"><?= esc($event['title']) ?></h1>
            <p class="text-sm text-gray-400 mt-1">
                <i data-lucide="calendar" class="w-3.5 h-3.5 inline"></i>
                <?= date('d F Y', strtotime($event['date'])) ?> &nbsp;·&nbsp;
                <i data-lucide="map-pin" class="w-3.5 h-3.5 inline"></i>
                <?= esc($event['location']) ?>
            </p>
        </div>
        <div class="ml-auto">
            <a href="/admin/event-registrations/<?= $event['id'] ?>/export" 
               class="bg-emerald-600 text-white px-5 py-2.5 rounded-2xl hover:bg-emerald-700 transition-all font-bold text-sm shadow-lg shadow-emerald-200 flex items-center gap-2">
                <i data-lucide="download" class="w-4 h-4"></i>
                Ekspor CSV
            </a>
        </div>
    </div>

    <!-- Flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl text-sm font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i> <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Stats Bar -->
    <div class="grid grid-cols-3 gap-4">
        <a href="?status=pending" class="bg-amber-50 border border-amber-100 rounded-2xl p-5 text-center hover:shadow-md transition-all <?= $active_status === 'pending' ? 'ring-2 ring-amber-400' : '' ?>">
            <p class="text-3xl font-black text-amber-600"><?= $counts['pending'] ?></p>
            <p class="text-xs text-amber-500 font-bold mt-1">Menunggu</p>
        </a>
        <a href="?status=confirmed" class="bg-green-50 border border-green-100 rounded-2xl p-5 text-center hover:shadow-md transition-all <?= $active_status === 'confirmed' ? 'ring-2 ring-green-400' : '' ?>">
            <p class="text-3xl font-black text-green-600"><?= $counts['confirmed'] ?></p>
            <p class="text-xs text-green-500 font-bold mt-1">Dikonfirmasi</p>
        </a>
        <a href="?status=cancelled" class="bg-red-50 border border-red-100 rounded-2xl p-5 text-center hover:shadow-md transition-all <?= $active_status === 'cancelled' ? 'ring-2 ring-red-400' : '' ?>">
            <p class="text-3xl font-black text-red-500"><?= $counts['cancelled'] ?></p>
            <p class="text-xs text-red-400 font-bold mt-1">Dibatalkan</p>
        </a>
    </div>

    <!-- Filter Reset -->
    <?php if ($active_status): ?>
        <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">Filter aktif: <strong class="text-gray-900"><?= esc($active_status) ?></strong></span>
            <a href="?" class="text-xs text-primary hover:underline font-bold">Tampilkan semua</a>
        </div>
    <?php endif; ?>

    <!-- Table -->
    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50/80 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">#</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Peserta</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Institusi</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Peran</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Didaftar</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Status</th>
                        <th class="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if (empty($participants)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center text-gray-400">
                                <i data-lucide="inbox" class="w-10 h-10 mx-auto mb-3 text-gray-200"></i>
                                <p>Belum ada pendaftar<?= $active_status ? ' dengan status ini' : '' ?>.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($participants as $i => $p): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 text-gray-400 font-mono text-xs"><?= $i + 1 ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-primary/10 text-primary flex items-center justify-center font-black text-sm flex-shrink-0">
                                            <?= strtoupper(substr($p['full_name'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900"><?= esc($p['full_name']) ?></p>
                                            <p class="text-xs text-gray-400"><?= esc($p['email']) ?></p>
                                            <p class="text-xs text-gray-400"><?= esc($p['phone']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-xs font-medium text-gray-700"><?= esc($p['institution']) ?></p>
                                    <?php if ($p['study_program']): ?>
                                        <p class="text-[10px] text-gray-400 mt-0.5"><?= esc($p['study_program']) ?></p>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full"><?= esc($p['role']) ?></span>
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-400 whitespace-nowrap">
                                    <?= date('d M Y', strtotime($p['registered_at'])) ?><br>
                                    <span class="text-gray-300"><?= date('H:i', strtotime($p['registered_at'])) ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/admin/event-registrations/status/<?= $p['id'] ?>" method="post">
                                        <?= csrf_field() ?>
                                        <select name="status" onchange="this.form.submit()"
                                            class="text-xs font-bold rounded-xl px-3 py-1.5 border-0 outline-none cursor-pointer
                                            <?= $p['status'] === 'confirmed' ? 'bg-green-100 text-green-700' : ($p['status'] === 'cancelled' ? 'bg-red-100 text-red-600' : 'bg-amber-100 text-amber-700') ?>">
                                            <option value="pending"   <?= $p['status'] === 'pending'   ? 'selected' : '' ?>>⏳ Menunggu</option>
                                            <option value="confirmed" <?= $p['status'] === 'confirmed' ? 'selected' : '' ?>>✅ Dikonfirmasi</option>
                                            <option value="cancelled" <?= $p['status'] === 'cancelled' ? 'selected' : '' ?>>❌ Dibatalkan</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <?php if (!empty($p['notes'])): ?>
                                            <button title="<?= esc($p['notes']) ?>"
                                                onclick="alert('Catatan:\n<?= esc(addslashes($p['notes'])) ?>')"
                                                class="p-2 text-blue-500 hover:bg-blue-50 rounded-xl transition-colors">
                                                <i data-lucide="message-square" class="w-4 h-4"></i>
                                            </button>
                                        <?php endif; ?>
                                        <a href="mailto:<?= esc($p['email']) ?>"
                                            class="p-2 text-green-600 hover:bg-green-50 rounded-xl transition-colors" title="Kirim Email">
                                            <i data-lucide="mail" class="w-4 h-4"></i>
                                        </a>
                                        <a href="/admin/event-registrations/delete/<?= $p['id'] ?>"
                                            onclick="return confirm('Hapus data pendaftar ini?')"
                                            class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors">
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

        <!-- Footer count -->
        <?php if (!empty($participants)): ?>
            <div class="px-8 py-4 border-t border-gray-50 text-xs text-gray-400">
                Menampilkan <?= count($participants) ?> pendaftar
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
