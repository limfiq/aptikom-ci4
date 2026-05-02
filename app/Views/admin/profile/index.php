<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Profil Organisasi<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <div>
        <h1 class="text-3xl font-black text-gray-900 tracking-tight">Profil Organisasi</h1>
        <p class="text-gray-500 mt-2 font-medium">Kelola informasi publik dan identitas APTIKOM Jatim di seluruh portal.</p>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-[32px] text-sm font-bold flex items-center gap-4 animate-in zoom-in duration-300">
            <div class="p-2 bg-emerald-100 rounded-xl">
                <i data-lucide="check" class="w-5 h-5"></i>
            </div>
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <form action="/admin/profile/update" method="post" class="space-y-8 pb-20">
        <?= csrf_field() ?>

        <!-- Basic Information -->
        <div class="bg-white rounded-[48px] shadow-sm border border-gray-100 p-10 space-y-8">
            <div class="flex items-center gap-4">
                <div class="p-4 bg-blue-50 text-blue-600 rounded-3xl">
                    <i data-lucide="info" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-black text-gray-900">Informasi Dasar</h2>
            </div>

            <div class="space-y-6">
                <div class="grid gap-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Nama Organisasi / Kantor</label>
                    <input type="text" name="officeName" value="<?= $profile['officeName'] ?? $profile['name'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900" placeholder="APTIKOM Jatim Pusat">
                </div>
                <div class="grid gap-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Alamat Lengkap</label>
                    <textarea name="address" rows="3" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900 leading-relaxed"><?= $profile['address'] ?? '' ?></textarea>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Kota</label>
                        <input type="text" name="city" value="<?= $profile['city'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                    </div>
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Provinsi</label>
                        <input type="text" name="province" value="<?= $profile['province'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                    </div>
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Kode Pos</label>
                        <input type="text" name="postalCode" value="<?= $profile['postalCode'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                    </div>
                </div>
            </div>
        </div>

        <!-- Chairperson Section -->
        <div class="bg-white rounded-[48px] shadow-sm border border-gray-100 p-10 space-y-8">
            <div class="flex items-center gap-4">
                <div class="p-4 bg-emerald-50 text-emerald-600 rounded-3xl">
                    <i data-lucide="user" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-black text-gray-900">Ketua Umum</h2>
            </div>

            <div class="space-y-6">
                <div class="grid gap-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Nama Ketua Umum</label>
                    <input type="text" name="chairperson" value="<?= $profile['chairperson'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900" placeholder="Nama Lengkap Beserta Gelar">
                </div>
                <div class="grid gap-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">URL Foto Ketua Umum</label>
                    <input type="text" name="chairpersonPhoto" value="<?= $profile['chairpersonPhoto'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900" placeholder="https://example.com/photo.jpg">
                    <p class="text-[10px] text-gray-400 px-1 font-medium">Gunakan URL foto resmi untuk ditampilkan di halaman utama.</p>
                </div>
            </div>
        </div>

        <!-- Contact & Hours -->
        <div class="bg-white rounded-[48px] shadow-sm border border-gray-100 p-10 space-y-8">
            <div class="flex items-center gap-4">
                <div class="p-4 bg-purple-50 text-purple-600 rounded-3xl">
                    <i data-lucide="phone" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-black text-gray-900">Kontak & Jam Operasional</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Alamat Email</label>
                        <input type="email" name="email" value="<?= $profile['email'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                    </div>
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Telepon / WhatsApp</label>
                        <input type="text" name="phone" value="<?= $profile['phone'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Jam Kerja (Hari Kerja)</label>
                        <input type="text" name="weekdayHours" value="<?= $profile['weekdayHours'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900" placeholder="08.00 - 17.00">
                    </div>
                    <div class="grid gap-2">
                        <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Jam Kerja (Akhir Pekan)</label>
                        <input type="text" name="weekendHours" value="<?= $profile['weekendHours'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900" placeholder="Tutup">
                    </div>
                </div>
            </div>
        </div>

        <!-- Geo Location -->
        <div class="bg-white rounded-[48px] shadow-sm border border-gray-100 p-10 space-y-8">
            <div class="flex items-center gap-4">
                <div class="p-4 bg-orange-50 text-orange-600 rounded-3xl">
                    <i data-lucide="map-pin" class="w-6 h-6"></i>
                </div>
                <h2 class="text-xl font-black text-gray-900">Lokasi Geografis (Maps)</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="grid gap-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Latitude</label>
                    <input type="text" name="latitude" value="<?= $profile['latitude'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                </div>
                <div class="grid gap-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] px-1">Longitude</label>
                    <input type="text" name="longitude" value="<?= $profile['longitude'] ?? '' ?>" class="w-full bg-gray-50 border-0 rounded-3xl px-6 py-5 focus:ring-4 focus:ring-primary/10 transition-all font-bold text-gray-900">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="sticky bottom-8 z-30">
            <button type="submit" class="w-full bg-primary text-white py-6 rounded-[32px] hover:bg-primary-hover transition-all font-black text-lg shadow-2xl shadow-primary/40 flex items-center justify-center gap-4 group">
                <i data-lucide="save" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                Simpan Seluruh Pengaturan Profil
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
