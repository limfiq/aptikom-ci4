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
        <form action="<?= isset($member) ? '/admin/members/individuals/update/'.$member['id'] : '/admin/members/individuals/store' ?>" method="post" class="space-y-6">
            <?= csrf_field() ?>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Nomor Induk Anggota (NIA) / NIDN</label>
                    <input type="text" name="employeeNumber" value="<?= old('employeeNumber', $member['employeeNumber'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="APT-001" required>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Nama Lengkap</label>
                    <input type="text" name="name" value="<?= old('name', $member['name'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" placeholder="Contoh: Dr. John Doe" required>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Afiliasi (Kampus/Instansi)</label>
                    <input type="text" name="affiliation" value="<?= old('affiliation', $member['affiliation'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Program Studi</label>
                    <input type="text" name="studyProgram" value="<?= old('studyProgram', $member['studyProgram'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Jabatan</label>
                    <select name="role" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold">
                        <option value="Dosen" <?= old('role', $member['role'] ?? '') == 'Dosen' ? 'selected' : '' ?>>Dosen</option>
                        <option value="Peneliti" <?= old('role', $member['role'] ?? '') == 'Peneliti' ? 'selected' : '' ?>>Peneliti</option>
                        <option value="Praktisi" <?= old('role', $member['role'] ?? '') == 'Praktisi' ? 'selected' : '' ?>>Praktisi</option>
                        <option value="Mahasiswa" <?= old('role', $member['role'] ?? '') == 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Provinsi</label>
                    <input type="text" name="province" value="<?= old('province', $member['province'] ?? '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 tracking-widest">Masa Berlaku</label>
                    <input type="date" name="validityPeriod" value="<?= old('validityPeriod', isset($member) ? date('Y-m-d', strtotime($member['validityPeriod'])) : '') ?>" class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-primary/10 transition-all font-bold" required>
                </div>
            </div>

            <div class="flex gap-4 pt-6">
                <button type="submit" class="flex-grow bg-primary text-white py-5 rounded-3xl hover:bg-primary-hover transition-all font-black text-sm shadow-xl shadow-primary/20">
                    Simpan Data Anggota
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
