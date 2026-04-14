<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-primary mb-4">Dokumen & Edaran</h1>
            <p class="text-gray-600">
                Unduh materi panduan resmi, surat keputusan, dan surat edaran dari APTIKOM Jatim Pusat maupun Wilayah.
            </p>
        </div>

        <div class="space-y-12">
            <?php foreach($sections as $section): ?>
                <div>
                    <div class="flex items-center mb-6">
                        <i data-lucide="folder" class="text-secondary mr-2 w-[24px] h-[24px]"></i>
                        <h2 class="text-2xl font-bold text-primary"><?= $section['category'] ?></h2>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 divide-y divide-gray-100">
                        <?php foreach($section['items'] as $doc): ?>
                            <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <div class="flex items-center">
                                    <div class="bg-red-50 text-red-500 w-10 h-10 rounded-lg flex items-center justify-center mr-4">
                                        <i data-lucide="file-text" class="w-[20px] h-[20px]"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900"><?= $doc['title'] ?></h3>
                                        <div class="flex text-xs text-gray-400 mt-1 space-x-2 items-center">
                                            <span><?= date('M Y', strtotime($doc['updatedAt'])) ?></span>
                                            <span class="text-gray-300">&bull;</span>
                                            <span><?= $doc['size'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <a
                                    href="<?= $doc['fileUrl'] ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-gray-400 hover:text-secondary transition-colors p-2 rounded-full hover:bg-gray-100"
                                    title="Download"
                                >
                                    <i data-lucide="download" class="w-[20px] h-[20px]"></i>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if(empty($sections)): ?>
            <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-gray-100">
                <i data-lucide="file-x" class="mx-auto w-16 h-16 text-gray-200 mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada dokumen yang tersedia saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
