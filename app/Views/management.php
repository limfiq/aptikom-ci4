<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary py-16 text-center text-white">
        <h1 class="text-4xl font-bold mb-4">Susunan Pengurus APTIKOM Jatim</h1>
        <p class="text-xl opacity-90 max-w-2xl mx-auto">
            Masa Bakti <?= !empty($boardMembers) ? $boardMembers[0]['period'] : '2022 - 2026' ?>
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <?php if(!empty($leaders)): ?>
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-primary mb-8 border-l-4 border-secondary pl-4">Leader</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($leaders as $member): ?>
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden text-center p-6 border border-gray-100">
                        <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden border-4 border-gray-100">
                            <img src="<?= !empty($member['image']) ? $member['image'] : 'https://ui-avatars.com/api/?name='.urlencode($member['name']).'&background=random' ?>" alt="<?= $member['name'] ?>" class="w-full h-full object-cover" />
                        </div>
                        <h3 class="text-lg font-bold text-primary"><?= $member['name'] ?></h3>
                        <p class="text-secondary font-medium"><?= $member['position'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Departemen -->
        <?php if(!empty($departments)): ?>
        <div>
            <h2 class="text-2xl font-bold text-primary mb-8 border-l-4 border-secondary pl-4">Departemen</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($departments as $member): ?>
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden text-center p-6 border border-gray-100">
                        <div class="w-32 h-32 mx-auto bg-gray-200 rounded-full mb-4 overflow-hidden border-4 border-gray-100">
                            <img src="<?= !empty($member['image']) ? $member['image'] : 'https://ui-avatars.com/api/?name='.urlencode($member['name']).'&background=random' ?>" alt="<?= $member['name'] ?>" class="w-full h-full object-cover" />
                        </div>
                        <h3 class="text-lg font-bold text-primary"><?= $member['name'] ?></h3>
                        <p class="text-secondary font-medium"><?= $member['position'] ?></p>
                        <?php if(!empty($member['department']) && strtolower($member['department']) !== 'departemen'): ?>
                            <p class="text-sm text-gray-500 mt-1"><?= $member['department'] ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<?= $this->endSection() ?>
