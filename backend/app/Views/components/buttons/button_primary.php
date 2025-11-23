<?php
// Component: components/buttons/button_primary.php
$label ??= 'Primary';
$href ??= null;
$disable ??= false;
?>

<?php if ($disable): ?>
    <button type="button"
        disabled
        class="px-5 py-3 rounded-full font-semibold cursor-not-allowed opacity-50
               bg-white/20 backdrop-blur-md border border-white/30
               text-slate-300">
        <?= esc($label) ?>
    </button>

<?php elseif ($href): ?>
    <a href="<?= $href === '#' ? 'javascript:void(0)' : esc($href) ?>"
        class="inline-block px-5 py-3 rounded-full font-semibold transition duration-200
               text-slate-900
               bg-gradient-to-r from-blue-200/70 to-indigo-200/70
               hover:from-blue-300/80 hover:to-indigo-300/80
               backdrop-blur-md border border-white/40 shadow-sm">
        <?= esc($label) ?>
    </a>

<?php else: ?>
    <button type="button"
        class="px-5 py-3 rounded-full font-semibold transition duration-200
               text-slate-900
               bg-gradient-to-r from-blue-200/70 to-indigo-200/70
               hover:from-blue-300/80 hover:to-indigo-300/80
               backdrop-blur-md border border-white/40 shadow-sm">
        <?= esc($label) ?>
    </button>
<?php endif; ?>