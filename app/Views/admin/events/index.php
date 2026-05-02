<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Manajemen Kegiatan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 animate-in fade-in duration-700">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-black text-gray-900">Manajemen Kegiatan</h1>
            <p class="text-sm text-gray-500">Jadwalkan dan kelola konferensi, workshop, atau seminar APTIKOM Jatim.</p>
        </div>
        <a href="/admin/events/create" class="bg-primary text-white px-5 py-2.5 rounded-2xl hover:bg-primary-hover transition-all font-bold text-sm shadow-lg shadow-primary/20 flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Tambah Kegiatan
        </a>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-2xl text-sm font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Kegiatan</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Waktu & Tempat</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Tipe</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Status</th>
                        <th class="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if (empty($events)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400 italic">Belum ada kegiatan yang direncanakan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($events as $event): ?>
                        <tr class="group hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-900"><?= $event['title'] ?></p>
                                <p class="text-[10px] text-gray-400 mt-0.5 line-clamp-1 italic"><?= $event['description'] ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs font-bold text-gray-700 flex items-center gap-1">
                                        <i data-lucide="calendar" class="w-3 h-3 text-primary"></i>
                                        <?= date('d M Y', strtotime($event['date'])) ?>
                                    </span>
                                    <span class="text-[10px] text-gray-400 flex items-center gap-1 font-medium">
                                        <i data-lucide="map-pin" class="w-3 h-3"></i>
                                        <?= $event['location'] ?>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter
                                    <?= $event['type'] == 'conference' ? 'bg-purple-100 text-purple-700' : 
                                       ($event['type'] == 'workshop' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700') ?>">
                                    <?= $event['type'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter
                                    <?= $event['status'] == 'open' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' ?>">
                                    <?= $event['status'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2 text-gray-400">
                                    <a href="/admin/events/edit/<?= $event['id'] ?>" class="p-2 hover:text-primary hover:bg-blue-50 rounded-lg transition-all" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <a href="/admin/events/delete/<?= $event['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')" class="p-2 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
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
