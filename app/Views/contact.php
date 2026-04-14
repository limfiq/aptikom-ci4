<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>Hubungi Kami - APTIKOM Jatim<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero -->
<div class="bg-primary py-20 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1920')] bg-cover bg-center"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/10 text-blue-200 text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-6">Kontak</span>
        <h1 class="text-5xl font-black mb-4">Hubungi Kami</h1>
        <p class="text-xl opacity-80 max-w-2xl mx-auto">
            Kami siap mendengar masukan, pertanyaan, dan saran Anda untuk kemajuan pendidikan informatika bersama.
        </p>
    </div>
</div>

<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Flash Messages -->
        <div class="max-w-5xl mx-auto mb-10">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
                    <i data-lucide="check-circle" class="w-6 h-6 text-green-500 flex-shrink-0"></i>
                    <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
                    <i data-lucide="alert-circle" class="w-6 h-6 text-red-500 flex-shrink-0"></i>
                    <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl shadow-sm">
                    <div class="flex items-center gap-3 mb-2">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 flex-shrink-0"></i>
                        <span class="font-bold">Mohon periksa kembali form Anda:</span>
                    </div>
                    <ul class="list-disc list-inside text-sm space-y-1 ml-8">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div class="grid lg:grid-cols-5 gap-10 max-w-5xl mx-auto">

            <!-- ─── Left: Contact Info ─── -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Identitas -->
                <div class="bg-white rounded-[32px] p-8 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-black text-gray-900 mb-6 flex items-center gap-2">
                        <i data-lucide="building-2" class="w-5 h-5 text-primary"></i>
                        <?= esc($info['name'] ?? 'APTIKOM Jatim') ?>
                    </h3>
                    <ul class="space-y-5">
                        <?php if (!empty($info['address'])): ?>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i data-lucide="map-pin" class="w-5 h-5 text-primary"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-700 text-sm mb-0.5">Alamat</p>
                                    <p class="text-gray-500 text-sm leading-relaxed">
                                        <?php 
                                            $addr = $info['address'] ?? '';
                                            $cty = $info['city'] ?? '';
                                            $pst = $info['postalCode'] ?? '';
                                            
                                            echo esc($addr);
                                            if ($cty && stripos($addr, $cty) === false) echo '<br>' . esc($cty);
                                            if ($pst && stripos($addr, $pst) === false) echo ' ' . esc($pst);
                                        ?>
                                    </p>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($info['phone'])): ?>
                            <li class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i data-lucide="phone" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-700 text-sm mb-0.5">Telepon</p>
                                    <a href="tel:<?= esc($info['phone']) ?>" class="text-gray-500 text-sm hover:text-primary transition-colors">
                                        <?= esc($info['phone']) ?>
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($info['email'])): ?>
                            <li class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i data-lucide="mail" class="w-5 h-5 text-amber-600"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-700 text-sm mb-0.5">Email</p>
                                    <a href="mailto:<?= esc($info['email']) ?>" class="text-gray-500 text-sm hover:text-primary transition-colors">
                                        <?= esc($info['email']) ?>
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Jam Operasional -->
                <div class="bg-primary rounded-[32px] p-8 text-white shadow-xl relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-28 h-28 bg-white/5 rounded-full"></div>
                    <h3 class="font-black text-lg mb-5 flex items-center gap-2 relative z-10">
                        <i data-lucide="clock" class="w-5 h-5"></i> Jam Operasional
                    </h3>
                    <ul class="space-y-3 text-sm relative z-10">
                        <?php if (!empty($info['weekdayHours'])): ?>
                            <li class="flex justify-between border-b border-white/10 pb-3">
                                <span class="text-blue-200">Senin – Jumat</span>
                                <span class="font-bold"><?= esc($info['weekdayHours']) ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($info['weekendHours'])): ?>
                            <li class="flex justify-between">
                                <span class="text-blue-200">Sabtu – Minggu</span>
                                <span class="font-bold"><?= esc($info['weekendHours']) ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Sosial Media -->
                <?php $hasSocial = !empty($info['facebook']) || !empty($info['twitter']) || !empty($info['instagram']) || !empty($info['linkedin']); ?>
                <?php if ($hasSocial): ?>
                    <div class="bg-white rounded-[32px] p-8 shadow-sm border border-gray-100">
                        <h3 class="font-black text-gray-700 text-sm uppercase tracking-widest mb-5">Ikuti Kami</h3>
                        <div class="flex flex-wrap gap-3">
                            <?php if (!empty($info['facebook'])): ?>
                                <a href="<?= esc($info['facebook']) ?>" target="_blank"
                                    class="flex items-center gap-2 px-4 py-2.5 bg-blue-50 text-blue-700 rounded-2xl text-sm font-bold hover:bg-blue-100 transition-colors">
                                    <i data-lucide="facebook" class="w-4 h-4"></i> Facebook
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($info['twitter'])): ?>
                                <a href="<?= esc($info['twitter']) ?>" target="_blank"
                                    class="flex items-center gap-2 px-4 py-2.5 bg-sky-50 text-sky-600 rounded-2xl text-sm font-bold hover:bg-sky-100 transition-colors">
                                    <i data-lucide="twitter" class="w-4 h-4"></i> Twitter
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($info['instagram'])): ?>
                                <a href="<?= esc($info['instagram']) ?>" target="_blank"
                                    class="flex items-center gap-2 px-4 py-2.5 bg-pink-50 text-pink-600 rounded-2xl text-sm font-bold hover:bg-pink-100 transition-colors">
                                    <i data-lucide="instagram" class="w-4 h-4"></i> Instagram
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($info['linkedin'])): ?>
                                <a href="<?= esc($info['linkedin']) ?>" target="_blank"
                                    class="flex items-center gap-2 px-4 py-2.5 bg-blue-50 text-blue-800 rounded-2xl text-sm font-bold hover:bg-blue-100 transition-colors">
                                    <i data-lucide="linkedin" class="w-4 h-4"></i> LinkedIn
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ─── Right: Contact Form ─── -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-[32px] p-10 shadow-sm border border-gray-100 h-full">
                    <h2 class="text-2xl font-black text-gray-900 mb-2">Kirim Pesan</h2>
                    <p class="text-gray-400 text-sm mb-8">Isi formulir di bawah ini dan kami akan merespons dalam 1×24 jam kerja.</p>

                    <form action="/contact/submit" method="post" class="space-y-6" id="contact-form" novalidate>
                        <?= csrf_field() ?>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-400">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                    value="<?= esc(old('name')) ?>"
                                    maxlength="100" autocomplete="name" required
                                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                                    placeholder="Nama Anda">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                                    Email <span class="text-red-400">*</span>
                                </label>
                                <input type="email" id="email" name="email"
                                    value="<?= esc(old('email')) ?>"
                                    maxlength="150" autocomplete="email" required
                                    class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                                    placeholder="nama@institusi.ac.id">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">
                                Subjek <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="subject" name="subject"
                                value="<?= esc(old('subject')) ?>"
                                maxlength="200" required
                                class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all"
                                placeholder="Perihal pesan Anda">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-gray-700 mb-2">
                                Pesan <span class="text-red-400">*</span>
                            </label>
                            <textarea id="message" name="message" rows="6"
                                maxlength="2000" required
                                class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all resize-none"
                                placeholder="Tuliskan pesan Anda secara lengkap..."><?= esc(old('message')) ?></textarea>
                            <p class="text-xs text-gray-400 mt-1 text-right" id="char-count">0 / 2000 karakter</p>
                        </div>

                        <!-- Honeypot field (Anti-bot) -->
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <button type="submit" id="submit-btn"
                            class="w-full bg-primary hover:bg-primary-hover text-white font-black py-4 px-6 rounded-2xl transition-all transform hover:-translate-y-0.5 shadow-lg shadow-primary/20 flex items-center justify-center gap-3">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            Kirim Pesan Sekarang
                        </button>

                        <p class="text-center text-xs text-gray-400">
                            <i data-lucide="shield-check" class="w-3 h-3 inline mr-1"></i>
                            Pesan Anda dilindungi dan tidak akan dibagikan kepada pihak ketiga.
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Google Maps Embed -->
        <?php if (!empty($info['latitude']) && !empty($info['longitude'])): ?>
            <div class="mt-12 max-w-5xl mx-auto">
                <div class="bg-white rounded-[32px] overflow-hidden shadow-sm border border-gray-100">
                    <iframe
                        src="https://www.google.com/maps?q=<?= esc($info['latitude']) ?>,<?= esc($info['longitude']) ?>&z=16&output=embed"
                        width="100%" height="380" style="border:0;" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="Lokasi <?= esc($info['name'] ?? 'APTIKOM Jatim') ?>">
                    </iframe>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
// Character counter for message field
const msg   = document.getElementById('message');
const count = document.getElementById('char-count');
if (msg && count) {
    msg.addEventListener('input', () => {
        count.textContent = msg.value.length + ' / 2000 karakter';
    });
}

// Disable submit button after first click to prevent double submit
document.getElementById('contact-form')?.addEventListener('submit', function () {
    const btn = document.getElementById('submit-btn');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Mengirim...';
    }
});
</script>

<?= $this->endSection() ?>
