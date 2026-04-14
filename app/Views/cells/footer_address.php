<ul class="space-y-4 text-sm">
    <li class="flex items-start">
        <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-secondary flex-shrink-0 mt-0.5"></i>
        <p class="text-gray-300 text-sm leading-relaxed">
            <?php 
                $addr = $profile['address'] ?? '';
                $cty = $profile['city'] ?? '';
                $pst = $profile['postalCode'] ?? '';
                
                echo esc($addr);
                // Consistency fix: don't repeat city/zip if already in address
                if ($cty && stripos($addr, $cty) === false) echo '<br>' . esc($cty);
                if ($pst && stripos($addr, $pst) === false) echo ' ' . esc($pst);
            ?>
        </p>
    </li>
    <li class="flex items-center">
        <i data-lucide="phone" class="w-5 h-5 mr-3 text-secondary flex-shrink-0"></i>
        <a href="tel:<?= esc($profile['phone'] ?? '') ?>" class="hover:text-secondary transition-colors"><?= esc($profile['phone'] ?? '') ?></a>
    </li>
    <li class="flex items-center">
        <i data-lucide="mail" class="w-5 h-5 mr-3 text-secondary flex-shrink-0"></i>
        <a href="mailto:<?= esc($profile['email'] ?? '') ?>" class="hover:text-secondary transition-colors"><?= esc($profile['email'] ?? '') ?></a>
    </li>
</ul>
