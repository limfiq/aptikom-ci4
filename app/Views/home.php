<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<!-- Hero Slider Section -->
<section class="relative bg-primary text-white overflow-hidden min-h-[600px] flex items-center">
    <?php if (!empty($banners)): ?>
        <div id="hero-slider" class="absolute inset-0 w-full h-full">
            <?php foreach ($banners as $index => $banner): ?>
                <div class="banner-slide absolute inset-0 transition-opacity duration-1000 <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>"
                    data-index="<?= $index ?>">
                    <div class="absolute inset-0 bg-cover bg-center"
                        style="background-image: url('<?= $banner['backgroundImage'] ?: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1920&q=80' ?>');">
                        <div class="absolute inset-0 bg-primary/40 backdrop-blur-[2px]"></div>
                    </div>
                    <div
                        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative h-full flex flex-col justify-center text-center">
                        <h1
                            class="text-5xl md:text-7xl font-black mb-6 drop-shadow-2xl animate-in slide-in-from-bottom duration-700">
                            <?= $banner['title'] ?>
                        </h1>
                        <p
                            class="text-xl md:text-2xl font-medium mb-10 max-w-4xl mx-auto opacity-90 leading-relaxed animate-in slide-in-from-bottom delay-200 duration-700">
                            <?= $banner['subtitle'] ?>
                        </p>
                        <?php if ($banner['buttonText']): ?>
                            <div class="flex justify-center animate-in zoom-in delay-500 duration-700">
                                <a href="<?= $banner['buttonLink'] ?: '#' ?>"
                                    class="bg-secondary hover:bg-secondary-hover text-white font-black py-4 px-10 rounded-full shadow-2xl shadow-secondary/40 transition-all transform hover:-translate-y-1">
                                    <?= $banner['buttonText'] ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative py-32 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6">Asosiasi Pendidikan Tinggi Informatika dan Komputer Jawa Timur</h1>
            <p class="text-xl md:text-2xl font-light mb-10 max-w-3xl mx-auto opacity-90">Membangun talenta digital APTIKOM Jatim
                yang unggul dan berdaya saing global.</p>
        </div>
    <?php endif; ?>
</section>

<!-- Stats Recap Section -->
<section class="bg-slate-900 py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-[center_top_-1px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 items-center">
            <!-- Stat Item -->
            <div class="text-center group">
                <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-3 tracking-tighter transition-transform group-hover:scale-110 duration-300">
                    <?= number_format($countIndividu) ?>+
                </div>
                <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-[0.3em] leading-tight">
                    Anggota Individu
                </div>
            </div>

            <!-- Stat Item -->
            <div class="text-center group">
                <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-3 tracking-tighter transition-transform group-hover:scale-110 duration-300">
                    <?= number_format($countInstitusi) ?>+
                </div>
                <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-[0.3em] leading-tight">
                    Anggota Institusi
                </div>
            </div>

            <!-- Stat Item -->
            <div class="text-center group">
                <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-3 tracking-tighter transition-transform group-hover:scale-110 duration-300">
                    <?= number_format($countMitra) ?>+
                </div>
                <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-[0.3em] leading-tight">
                    Mitra Industri
                </div>
            </div>

            <!-- Stat Item -->
            <div class="text-center group">
                <div class="text-4xl md:text-5xl font-black text-cyan-400 mb-3 tracking-tighter transition-transform group-hover:scale-110 duration-300">
                    24/7
                </div>
                <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase tracking-[0.3em] leading-tight">
                    Akses Sistem
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chairman's Welcome Section -->
<section class="py-24 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-5/12 text-center relative">
                <div class="relative w-72 h-72 mx-auto mb-8">
                    <div class="absolute inset-0 bg-primary rounded-[48px] transform -rotate-6 opacity-5"></div>
                    <div class="absolute inset-0 bg-secondary rounded-[48px] transform rotate-6 opacity-10"></div>
                    <img src="<?= $chairperson['image'] ?? 'https://randomuser.me/api/portraits/men/1.jpg' ?>"
                        alt="<?= esc($chairperson['name'] ?? 'Ketua Umum') ?>"
                        class="relative w-full h-full object-cover rounded-[48px] border-4 border-white shadow-2xl z-10" />
                </div>
                <h3 class="text-2xl font-black text-gray-900">
                    <?= esc($chairperson['name'] ?? 'Prof. Dr. Ir. Zainal A. Hasibuan, MLS., Ph.D.') ?>
                </h3>
                <p class="text-primary font-black uppercase tracking-[0.2em] text-xs mt-2">
                    <?= esc($chairperson['position'] ?? 'Ketua Umum') ?> APTIKOM Jatim
                </p>
            </div>
            <div class="md:w-7/12">
                <div class="space-y-6">
                    <span
                        class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-full">Sambutan
                        Ketua Umum</span>
                    <h2 class="text-4xl font-black text-gray-900 leading-tight">
                        Bersinergi Memajukan Pendidikan <br /><span class="text-primary">Informatika Indonesia</span>
                    </h2>
                    <div class="h-2 w-24 bg-secondary rounded-full"></div>
                    <p class="text-gray-500 text-lg leading-relaxed italic">
                        "<?= esc($chairperson['description'] ?? 'Selamat datang di website resmi Asosiasi Pendidikan Tinggi Informatika dan Komputer (APTIKOM Jatim). Di era transformasi digital yang begitu cepat ini, kolaborasi adalah kunci. APTIKOM Jatim hadir sebagai rumah besar bagi seluruh perguruan tinggi informatika di Indonesia untuk bersinergi, berbagi pengetahuan, dan meningkatkan mutu pendidikan demi mencetak talenta digital bangsa yang unggul dan berdaya saing global.') ?>"
                    </p>
                    <div class="flex gap-6 pt-4">
                        <a href="/about"
                            class="bg-gray-900 text-white px-8 py-4 rounded-2xl hover:bg-black transition-all font-bold shadow-xl shadow-gray-200 flex items-center gap-2">
                            Profil Lengkap <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <a href="/management"
                            class="border-2 border-gray-100 text-gray-900 px-8 py-4 rounded-2xl hover:bg-gray-50 transition-all font-bold flex items-center gap-2">
                            Lihat Pengurus <i data-lucide="users" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats / Why Us -->
<section class="py-24 bg-gray-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-10">
            <div
                class="p-10 bg-white rounded-[40px] shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 text-blue-600 group-hover:scale-110 transition-transform">
                    <i data-lucide="network" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4">Jejaring Luas</h3>
                <p class="text-gray-500 leading-relaxed text-sm">Terhubung dengan ribuan program studi dan pakar
                    informatika se-Indonesia untuk kolaborasi riset.</p>
            </div>
            <div
                class="p-10 bg-white rounded-[40px] shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 text-purple-600 group-hover:scale-110 transition-transform">
                    <i data-lucide="file-check" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4">Kurikulum Standar</h3>
                <p class="text-gray-500 leading-relaxed text-sm">Akses panduan kurikulum berbasis OBE dan KKNI yang
                    selaras dengan industri global.</p>
            </div>
            <div
                class="p-10 bg-white rounded-[40px] shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                <div
                    class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mb-6 text-amber-600 group-hover:scale-110 transition-transform">
                    <i data-lucide="award" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4">Mutu Pendidikan</h3>
                <p class="text-gray-500 leading-relaxed text-sm">Pendampingan klinik mutu untuk membantu prodi mencapai
                    akreditasi Unggul.</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest News & Upcoming Events -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-16">

            <!-- News Feed -->
            <div class="lg:col-span-8">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <span class="text-[10px] font-black uppercase text-secondary tracking-[0.3em] mb-2 block">Kabar
                            Terbaru</span>
                        <h2 class="text-4xl font-black text-gray-900">Portal Berita</h2>
                    </div>
                    <a href="/news" class="text-sm font-black text-primary hover:underline flex items-center gap-2">
                        Lihat Semua <i data-lucide="arrow-right-circle" class="w-5 h-5"></i>
                    </a>
                </div>

                <div class="grid sm:grid-cols-2 gap-8">
                    <?php if (!empty($news)): ?>
                        <?php foreach ($news as $item): ?>
                            <div
                                class="group flex flex-col bg-white rounded-[40px] border border-gray-50 shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-500">
                                <div class="h-56 overflow-hidden relative">
                                    <img src="<?= $item['image'] ?: 'https://images.unsplash.com/photo-1504711432869-5d39a13c3347?auto=format&fit=crop&w=800&q=80' ?>"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                                    <div
                                        class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-[10px] font-black uppercase text-primary tracking-widest">
                                        <?= $item['category'] ?>
                                    </div>
                                </div>
                                <div class="p-8 flex-grow space-y-4">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                        <?= date('d F Y', strtotime($item['createdAt'])) ?></p>
                                    <h3
                                        class="text-xl font-black text-gray-900 leading-tight group-hover:text-primary transition-colors line-clamp-2">
                                        <?= $item['title'] ?></h3>
                                    <p class="text-sm text-gray-500 line-clamp-3"><?= strip_tags($item['content']) ?></p>
                                    <a href="/news/read/<?= $item['slug'] ?>"
                                        class="inline-flex items-center text-xs font-black uppercase tracking-widest text-primary border-b-2 border-primary/20 hover:border-primary transition-all pt-2">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div
                            class="col-span-full py-20 text-center bg-gray-50 rounded-[40px] border-2 border-dashed border-gray-100">
                            <i data-lucide="newspaper" class="w-12 h-12 text-gray-200 mx-auto mb-4"></i>
                            <p class="text-gray-400 font-bold">Belum ada berita terbaru.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Agenda Slide -->
            <div class="lg:col-span-4">
                <div class="bg-primary rounded-[48px] p-10 text-white shadow-2xl relative overflow-hidden h-full">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white opacity-5 rounded-full"></div>

                    <div class="relative z-10 flex flex-col h-full">
                        <div class="mb-10">
                            <span
                                class="text-[10px] font-black uppercase text-blue-300 tracking-[0.3em] mb-2 block">Agenda
                                Terdekat</span>
                            <h2 class="text-3xl font-black">Kegiatan & Acara</h2>
                        </div>

                        <div class="space-y-8 flex-grow">
                            <?php if (!empty($events)): ?>
                                <?php foreach ($events as $event): ?>
                                    <div class="flex gap-6 group">
                                        <div
                                            class="flex-shrink-0 w-16 h-16 bg-white/10 rounded-2xl flex flex-col items-center justify-center border border-white/10 group-hover:bg-secondary transition-colors duration-500">
                                            <span
                                                class="text-[10px] font-black uppercase leading-none mb-1"><?= date('M', strtotime($event['date'])) ?></span>
                                            <span
                                                class="text-2xl font-black leading-none"><?= date('d', strtotime($event['date'])) ?></span>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-[10px] font-black text-blue-300 uppercase tracking-widest">
                                                <?= $event['type'] ?></p>
                                            <h4
                                                class="font-bold text-lg leading-tight group-hover:text-secondary transition-colors line-clamp-2">
                                                <?= $event['title'] ?></h4>
                                            <div class="flex items-center text-[10px] text-white/60 font-medium">
                                                <i data-lucide="map-pin" class="w-3 h-3 mr-2"></i> <?= $event['location'] ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-blue-300 font-bold italic">Belum ada agenda terdekat.</p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-12">
                            <a href="/events"
                                class="block w-full text-center py-4 bg-white text-primary rounded-2xl font-black text-sm hover:bg-secondary hover:text-white transition-all shadow-lg">Lihat
                                Seluruh Agenda</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Our Achievements Section -->
<section class="py-24 bg-gray-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-[10px] font-black uppercase text-amber-500 tracking-[0.3em] mb-2 block">Capaian & Prestasi</span>
                <h2 class="text-4xl font-black text-gray-900">Prestasi Kami</h2>
            </div>
            <a href="/achievements" class="text-sm font-black text-amber-600 hover:underline flex items-center gap-2">
                Lihat Selengkapnya <i data-lucide="award" class="w-5 h-5"></i>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php if (!empty($achievements)): ?>
                <?php foreach ($achievements as $ach): ?>
                    <div class="group bg-white rounded-[40px] p-8 border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-amber-50 rounded-3xl flex items-center justify-center mb-6 text-amber-500 group-hover:scale-110 group-hover:bg-amber-100 transition-all duration-500">
                            <i data-lucide="<?= $ach['category'] === 'Internasional' ? 'globe' : 'award' ?>" class="w-10 h-10"></i>
                        </div>
                        <span class="text-[10px] font-black uppercase text-amber-600 tracking-widest mb-2"><?= $ach['category'] ?></span>
                        <h3 class="text-xl font-black text-gray-900 mb-3 leading-tight"><?= $ach['title'] ?></h3>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4"><?= date('F Y', strtotime($ach['date'])) ?></p>
                        <p class="text-sm text-gray-500 leading-relaxed"><?= $ach['description'] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full py-20 text-center bg-white rounded-[40px] border-2 border-dashed border-gray-100">
                    <i data-lucide="medal" class="w-12 h-12 text-gray-200 mx-auto mb-4"></i>
                    <p class="text-gray-400 font-bold">Belum ada data prestasi saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Partner Logo Cloud -->
<section class="py-16 bg-white border-t border-gray-50 flex flex-col items-center">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-[10px] font-black text-gray-300 uppercase tracking-[0.4em] mb-12">Program Kemitraan
            Strategis</h2>
        <div
            class="flex flex-wrap justify-center items-center gap-12 opacity-50 grayscale hover:grayscale-0 transition-all duration-700">
            <?php foreach ($partners as $p): ?>
                <img src="<?= $p['logo'] ?>" alt="<?= $p['name'] ?>"
                    class="h-10 w-auto object-contain hover:scale-110 transition-transform">
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    // Hero Slider Animation
    document.addEventListener('DOMContentLoaded', () => {
        const slides = document.querySelectorAll('.banner-slide');
        let currentSlide = 0;

        if (slides.length > 1) {
            setInterval(() => {
                slides[currentSlide].classList.remove('opacity-100');
                slides[currentSlide].classList.add('opacity-0');

                currentSlide = (currentSlide + 1) % slides.length;

                slides[currentSlide].classList.remove('opacity-0');
                slides[currentSlide].classList.add('opacity-100');
            }, 6000);
        }
    });
</script>
<?= $this->endSection() ?>