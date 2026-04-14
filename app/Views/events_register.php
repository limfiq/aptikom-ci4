<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>Daftar: <?= esc($event['title']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Back -->
<div class="bg-white border-b border-gray-100">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center gap-3 text-sm text-gray-400">
        <a href="/" class="hover:text-primary transition-colors">Beranda</a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <a href="/events" class="hover:text-primary transition-colors">Kegiatan</a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <a href="/events/<?= $event['id'] ?>" class="hover:text-primary transition-colors line-clamp-1 max-w-xs"><?= esc($event['title']) ?></a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <span class="text-gray-700 font-medium">Pendaftaran</span>
    </div>
</div>

<div class="bg-gray-50 py-16 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Event Info Banner -->
        <div class="bg-gradient-to-r from-primary to-blue-700 rounded-[32px] p-8 text-white mb-8 flex items-start gap-6 shadow-xl shadow-primary/20">
            <div class="bg-white/20 rounded-2xl p-4 flex-shrink-0 text-center min-w-[72px]">
                <p class="text-3xl font-black leading-none"><?= date('d', strtotime($event['date'])) ?></p>
                <p class="text-blue-200 text-[10px] font-black uppercase mt-0.5"><?= date('M Y', strtotime($event['date'])) ?></p>
            </div>
            <div>
                <span class="text-blue-200 text-[10px] font-black uppercase tracking-widest"><?= esc($event['type']) ?></span>
                <h1 class="text-xl font-black mt-1 leading-tight"><?= esc($event['title']) ?></h1>
                <p class="text-blue-200 text-sm mt-2 flex items-center gap-1.5">
                    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i> <?= esc($event['location']) ?>
                </p>
            </div>
        </div>

        <!-- Flash Errors -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl flex items-center gap-3 text-sm">
                <i data-lucide="alert-circle" class="w-5 h-5 flex-shrink-0"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl text-sm">
                <p class="font-bold mb-2 flex items-center gap-2"><i data-lucide="alert-triangle" class="w-4 h-4"></i> Mohon periksa form Anda:</p>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Registration Form Card -->
        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 border-b border-gray-50">
                <h2 class="text-2xl font-black text-gray-900 flex items-center gap-3">
                    <span class="w-1 h-7 bg-primary rounded-full inline-block"></span>
                    Form Pendaftaran
                </h2>
                <p class="text-gray-400 text-sm mt-1.5">Isi data diri Anda dengan benar. Semua field berbintang (*) wajib diisi.</p>
            </div>

            <form action="/events/<?= $event['id'] ?>/register" method="post" class="p-8 space-y-7" id="regForm">
                <?= csrf_field() ?>

                <!-- Data Pribadi -->
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-5">— Data Pribadi</p>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="full_name" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap <span class="text-red-400">*</span></label>
                            <input type="text" id="full_name" name="full_name" required maxlength="150"
                                value="<?= old('full_name') ?>"
                                class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none placeholder:text-gray-300"
                                placeholder="Masukkan nama lengkap sesuai KTP">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Aktif <span class="text-red-400">*</span></label>
                            <input type="email" id="email" name="email" required maxlength="150"
                                value="<?= old('email') ?>"
                                class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none placeholder:text-gray-300"
                                placeholder="contoh@email.com">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">No. HP / WhatsApp <span class="text-red-400">*</span></label>
                            <input type="tel" id="phone" name="phone" required maxlength="20"
                                value="<?= old('phone') ?>"
                                class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none placeholder:text-gray-300"
                                placeholder="08xx-xxxx-xxxx">
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-bold text-gray-700 mb-2">Peran <span class="text-red-400">*</span></label>
                            <select id="role" name="role" required
                                class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                                <option value="" disabled <?= !old('role') ? 'selected' : '' ?>>-- Pilih Peran --</option>
                                <option value="Mahasiswa" <?= old('role') === 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                                <option value="Dosen"     <?= old('role') === 'Dosen'     ? 'selected' : '' ?>>Dosen</option>
                                <option value="Umum"      <?= old('role') === 'Umum'      ? 'selected' : '' ?>>Umum / Profesional</option>
                            </select>
                        </div>

                        <div>
                            <label for="study_program" class="block text-sm font-bold text-gray-700 mb-2">Program Studi <span class="text-gray-400 font-normal">(opsional)</span></label>
                            <input type="text" id="study_program" name="study_program" maxlength="150"
                                value="<?= old('study_program') ?>"
                                class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none placeholder:text-gray-300"
                                placeholder="Teknik Informatika">
                        </div>
                    </div>
                </div>

                <!-- Institusi -->
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-5">— Institusi</p>
                    <div>
                        <label for="institution" class="block text-sm font-bold text-gray-700 mb-2">Nama Perguruan Tinggi / Lembaga <span class="text-red-400">*</span></label>
                        <input type="text" id="institution" name="institution" required maxlength="200"
                            value="<?= old('institution') ?>"
                            class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none placeholder:text-gray-300"
                            placeholder="Universitas / Politeknik / Perusahaan">
                    </div>
                </div>

                <!-- Catatan -->
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-5">— Informasi Tambahan</p>
                    <label for="notes" class="block text-sm font-bold text-gray-700 mb-2">Catatan / Pertanyaan <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <textarea id="notes" name="notes" rows="4" maxlength="1000"
                        class="w-full bg-gray-50 border-0 rounded-2xl px-5 py-4 text-sm font-medium focus:ring-4 focus:ring-primary/10 transition-all outline-none placeholder:text-gray-300 resize-none"
                        placeholder="Tulis catatan atau pertanyaan Anda di sini..."><?= old('notes') ?></textarea>
                </div>

                <!-- Persetujuan -->
                <div class="flex items-start gap-3 bg-blue-50 rounded-2xl p-5">
                    <input type="checkbox" id="agree" required
                        class="mt-0.5 w-5 h-5 rounded accent-primary flex-shrink-0">
                    <label for="agree" class="text-sm text-gray-600 leading-relaxed">
                        Saya menyatakan bahwa data yang saya isi adalah <strong class="text-gray-900">benar dan akurat</strong>. 
                        Saya bersedia menerima konfirmasi dan informasi kegiatan melalui email/WhatsApp yang tercantum.
                    </label>
                </div>

                <button type="submit" id="submitBtn"
                    class="w-full bg-gradient-to-r from-primary to-blue-600 text-white py-5 rounded-2xl font-black text-base hover:shadow-2xl hover:shadow-primary/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-3">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    <span>Kirim Pendaftaran</span>
                </button>
            </form>
        </div>

    </div>
</div>

<script>
// Prevent double submit
document.getElementById('regForm').addEventListener('submit', function () {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin"></i><span>Mengirim...</span>';
    lucide.createIcons();
});
</script>

<?= $this->endSection() ?>
