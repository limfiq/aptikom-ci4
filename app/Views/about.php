<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="bg-white">
    <!-- Header -->
    <div class="bg-primary py-20 text-center text-white">
        <h1 class="text-4xl font-bold mb-4">Tentang <?= $profile['abbreviation'] ?? 'APTIKOM Jatim' ?></h1>
        <p class="text-xl opacity-90 max-w-2xl mx-auto">
            <?= $profile['fullName'] ?>
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Basic Info Section -->
        <div class="mb-16 bg-gradient-to-r from-primary/5 to-primary/10 p-8 rounded-xl border border-primary/20">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-primary mb-3">Informasi Dasar</h3>
                    <div class="space-y-2 text-gray-700">
                        <p><strong>Nama:</strong> <?= $profile['fullName'] ?></p>
                        <p><strong>Singkatan:</strong> <?= $profile['abbreviation'] ?></p>
                        <?php if($profile['establishedDate']): ?>
                            <p><strong>Didirikan:</strong> <?= date('d F Y', strtotime($profile['establishedDate'])) ?></p>
                        <?php endif; ?>
                        <?php if($profile['legalStatus']): ?>
                            <p><strong>Status Hukum:</strong> <?= $profile['legalStatus'] ?></p>
                        <?php endif; ?>
                        <?php if($profile['registrationNumber']): ?>
                            <p><strong>No. Registrasi:</strong> <?= $profile['registrationNumber'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-primary mb-3">Statistik</h3>
                    <div class="space-y-2 text-gray-700">
                        <p><strong>Total Anggota Individu:</strong> <?= number_format($profile['totalMembers'], 0, ',', '.') ?></p>
                        <p><strong>Total Institusi Anggota:</strong> <?= number_format($profile['totalInstitutions'], 0, ',', '.') ?></p>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-3 mt-6">Pengurus</h3>
                    <div class="space-y-2 text-gray-700">
                        <?php if($profile['chairperson']): ?><p><strong>Ketua:</strong> <?= $profile['chairperson'] ?></p><?php endif; ?>
                        <?php if($profile['secretary']): ?><p><strong>Sekretaris:</strong> <?= $profile['secretary'] ?></p><?php endif; ?>
                        <?php if($profile['treasurer']): ?><p><strong>Bendahara:</strong> <?= $profile['treasurer'] ?></p><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Section -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-primary mb-6">Sejarah Singkat</h2>
            <div class="prose prose-lg text-gray-600 max-w-none">
                <?php 
                    $paragraphs = explode("\n\n", $profile['history']);
                    foreach($paragraphs as $paragraph): 
                ?>
                    <p class="mb-4"><?= $paragraph ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="grid md:grid-cols-2 gap-12 mb-20">
            <div class="bg-gray-50 p-8 rounded-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-primary mb-4">Visi</h3>
                <p class="text-gray-700 italic leading-relaxed">
                    "<?= $profile['vision'] ?>"
                </p>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-primary mb-4">Misi</h3>
                <div class="text-gray-700 prose prose-sm max-w-none">
                    <?= $profile['mission'] ?>
                </div>
            </div>
        </div>

        <!-- Goals & Objectives -->
        <?php if($profile['goals'] || $profile['objectives']): ?>
            <div class="grid md:grid-cols-2 gap-12 mb-20">
                <?php if($profile['goals']): ?>
                    <div class="bg-primary/5 p-8 rounded-xl border border-primary/20">
                        <h3 class="text-2xl font-bold text-primary mb-4">Tujuan</h3>
                        <div class="text-gray-700 prose prose-sm max-w-none">
                            <?= $profile['goals'] ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($profile['objectives']): ?>
                    <div class="bg-primary/5 p-8 rounded-xl border border-primary/20">
                        <h3 class="text-2xl font-bold text-primary mb-4">Sasaran</h3>
                        <div class="text-gray-700 prose prose-sm max-w-none">
                            <?= $profile['objectives'] ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Organizational Structure -->
        <?php if($profile['structure']): ?>
            <div class="mb-20">
                <h2 class="text-3xl font-bold text-primary mb-6">Struktur Organisasi</h2>
                <div class="prose prose-lg text-gray-600 max-w-none bg-gray-50 p-8 rounded-xl border border-gray-100">
                    <?= $profile['structure'] ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Contact Information -->
        <div class="bg-gradient-to-br from-primary to-primary/80 text-white p-8 rounded-xl mb-20">
            <h2 class="text-3xl font-bold mb-6">Hubungi Kami</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Alamat</h3>
                    <div class="space-y-2 opacity-90">
                        <?php if($profile['address']): ?><p><?= $profile['address'] ?></p><?php endif; ?>
                        <?php if($profile['city'] || $profile['province']): ?>
                            <p><?= $profile['city'] ?><?= $profile['city'] && $profile['province'] ? ', ' : '' ?><?= $profile['province'] ?> <?= $profile['postalCode'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Kontak</h3>
                    <div class="space-y-2 opacity-90">
                        <?php if($profile['email']): ?>
                            <p>
                                <strong>Email:</strong> <a href="mailto:<?= $profile['email'] ?>" class="hover:underline"><?= $profile['email'] ?></a>
                            </p>
                        <?php endif; ?>
                        <?php if($profile['phone']): ?>
                            <p><strong>Telepon:</strong> <?= $profile['phone'] ?></p>
                        <?php endif; ?>
                        <?php if($profile['website']): ?>
                            <p>
                                <strong>Website:</strong> <a href="<?= $profile['website'] ?>" target="_blank" rel="noopener noreferrer" class="hover:underline"><?= $profile['website'] ?></a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <?php if($profile['facebook'] || $profile['twitter'] || $profile['instagram'] || $profile['linkedin'] || $profile['youtube']): ?>
            <div class="text-center">
                <h2 class="text-3xl font-bold text-primary mb-6">Ikuti Kami</h2>
                <div class="flex justify-center gap-6 flex-wrap">
                    <?php if($profile['facebook']): ?>
                        <a href="<?= $profile['facebook'] ?>" target="_blank" class="bg-[#1877F2] text-white px-6 py-3 rounded-lg hover:opacity-90 transition-opacity font-semibold">Facebook</a>
                    <?php endif; ?>
                    <?php if($profile['twitter']): ?>
                        <a href="<?= $profile['twitter'] ?>" target="_blank" class="bg-[#1DA1F2] text-white px-6 py-3 rounded-lg hover:opacity-90 transition-opacity font-semibold">Twitter</a>
                    <?php endif; ?>
                    <?php if($profile['instagram']): ?>
                        <a href="<?= $profile['instagram'] ?>" target="_blank" class="bg-gradient-to-r from-[#833AB4] via-[#FD1D1D] to-[#F77737] text-white px-6 py-3 rounded-lg hover:opacity-90 transition-opacity font-semibold">Instagram</a>
                    <?php endif; ?>
                    <?php if($profile['linkedin']): ?>
                        <a href="<?= $profile['linkedin'] ?>" target="_blank" class="bg-[#0A66C2] text-white px-6 py-3 rounded-lg hover:opacity-90 transition-opacity font-semibold">LinkedIn</a>
                    <?php endif; ?>
                    <?php if($profile['youtube']): ?>
                        <a href="<?= $profile['youtube'] ?>" target="_blank" class="bg-[#FF0000] text-white px-6 py-3 rounded-lg hover:opacity-90 transition-opacity font-semibold">YouTube</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
