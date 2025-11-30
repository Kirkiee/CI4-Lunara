<?php
// Component: components/buttons/button_header.php
// Data contract:
// $disable: boolean | null
// $href: string | null
// $label: string | null
?>

<?php if ($disable ?? false): ?>
    <a href="<?= esc($href ?? '#') ?>"
        class="inline-block opacity-50 cursor-not-allowed px-4 py-2 rounded-full font-semibold text-gray-100 
              bg-gradient-to-r from-blue-400 to-cyan-400 duration-200">
        <?= esc($label ?? 'Action') ?>
    </a>
<?php else: ?>
    <a href="<?= esc($href ?? '#') ?>"
        class="inline-block px-4 py-2 rounded-full font-semibold text-gray-100 
              bg-gradient-to-r from-blue-400 to-cyan-400 
              hover:from-blue-500 hover:to-cyan-500 
              hover:shadow-lg hover:shadow-cyan-300/30 
              transition-all duration-200">
        <?= esc($label ?? 'Action') ?>
    </a>
<?php endif; ?>