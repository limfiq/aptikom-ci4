<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 max-w-2xl mx-auto animate-in fade-in duration-500">
    <div class="flex items-center gap-4">
        <a href="/admin/members" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-400 hover:text-primary transition-all">
            <i data-lucide="chevron-left" class="w-6 h-6"></i>
        </a>
        <h1 class="text-2xl font-black text-gray-900"><?= $title ?></h1>
    </div>

    <div class="bg-white rounded-[32px] shadow-xl p-8 border border-gray-100">
        <form action="<?= isset($member) ? '/admin/members/board/update/'.$member['id'] : '/admin/members/board/store' ?>" method="post" class="space-y-6">
            <?= csrf_field() ?>
            
            <div class="space-y-2">
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Nama Lengkap & Gelar</label>
                <input type="text" name="name" value="<?= old('name', $member['name'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: Prof. Dr. Achmad Benny, M.T." required>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Jabatan Struktur</label>
                    <input type="text" name="position" value="<?= old('position', $member['position'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: Ketua Umum" required>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Departemen / Bidang</label>
                    <input type="text" name="department" value="<?= old('department', $member['department'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: Sekretariat Jenderal">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Periode Jabatan</label>
                    <input type="text" name="period" value="<?= old('period', $member['period'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="2023 - 2027" required>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Urutan Tampilan</label>
                    <input type="number" name="order" value="<?= old('order', $member['order'] ?? '0') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Foto URL (Optional)</label>
                <input type="text" name="image" value="<?= old('image', $member['image'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="https://example.com/foto.jpg">
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" class="flex-grow bg-primary text-white py-5 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">
                    Simpan Data Pengurus
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
