<div class="flex space-x-4">
    <?php if (!empty($profile['facebook'])): ?>
        <a href="<?= esc($profile['facebook']) ?>" class="text-gray-400 hover:text-secondary transition-colors"><i data-lucide="facebook" class="w-5 h-5"></i></a>
    <?php endif; ?>
    <?php if (!empty($profile['twitter'])): ?>
        <a href="<?= esc($profile['twitter']) ?>" class="text-gray-400 hover:text-secondary transition-colors"><i data-lucide="twitter" class="w-5 h-5"></i></a>
    <?php endif; ?>
    <?php if (!empty($profile['instagram'])): ?>
        <a href="<?= esc($profile['instagram']) ?>" class="text-gray-400 hover:text-secondary transition-colors"><i data-lucide="instagram" class="w-5 h-5"></i></a>
    <?php endif; ?>
    <?php if (!empty($profile['linkedin'])): ?>
        <a href="<?= esc($profile['linkedin']) ?>" class="text-gray-400 hover:text-secondary transition-colors"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
    <?php endif; ?>
</div>
