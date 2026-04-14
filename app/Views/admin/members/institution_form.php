<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="space-y-6 max-w-3xl mx-auto animate-in fade-in duration-500">
    <div class="flex items-center gap-4">
        <a href="/admin/members" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-400 hover:text-primary transition-all">
            <i data-lucide="chevron-left" class="w-6 h-6"></i>
        </a>
        <h1 class="text-2xl font-black text-gray-900"><?= $title ?></h1>
    </div>

    <div class="bg-white rounded-[32px] shadow-xl p-8 border border-gray-100">
        <form action="<?= isset($member) ? '/admin/members/institutions/update/'.$member['id'] : '/admin/members/institutions/store' ?>" method="post" class="space-y-6">
            <?= csrf_field() ?>
            
            <div class="space-y-2">
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Nama Perguruan Tinggi / Lembaga</label>
                <input type="text" name="name" value="<?= old('name', $member['name'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: Universitas Gadjah Mada" required>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Tipe Lembaga</label>
                    <select name="type" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                        <option value="Perguruan Tinggi Negeri" <?= old('type', $member['type'] ?? '') == 'Perguruan Tinggi Negeri' ? 'selected' : '' ?>>PTN (Negeri)</option>
                        <option value="Perguruan Tinggi Swasta" <?= old('type', $member['type'] ?? '') == 'Perguruan Tinggi Swasta' ? 'selected' : '' ?>>PTS (Swasta)</option>
                        <option value="Politeknik" <?= old('type', $member['type'] ?? '') == 'Politeknik' ? 'selected' : '' ?>>Politeknik</option>
                        <option value="Sekolah Tinggi" <?= old('type', $member['type'] ?? '') == 'Sekolah Tinggi' ? 'selected' : '' ?>>Sekolah Tinggi</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Provinsi</label>
                    <input type="text" name="province" value="<?= old('province', $member['province'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: D.I. Yogyakarta" required>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Website Resmi</label>
                <div class="relative">
                    <i data-lucide="globe" class="absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-300 w-5 h-5"></i>
                    <input type="url" name="website" value="<?= old('website', $member['website'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl pl-12 pr-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-blue-600" placeholder="https://example.ac.id">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Logo URL (Optional)</label>
                <input type="text" name="logo" value="<?= old('logo', $member['logo'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="https://example.com/logo.png">
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" class="flex-grow bg-primary text-white py-5 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">
                    Simpan Data Instansi
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
