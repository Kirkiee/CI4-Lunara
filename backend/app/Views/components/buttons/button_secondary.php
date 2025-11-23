<?php
$label ??= 'Secondary';
$href ??= null;
$disable ??= false;
?>

<?php if ($disable): ?>
    <button type="button"
        disabled
        class="px-5 py-3 rounded-full font-semibold cursor-not-allowed opacity-50
               bg-white/10 backdrop-blur-md border border-white/20
               text-slate-300">
        <?= esc($label) ?>
    </button>

<?php elseif ($href): ?>
    <a href="<?= $href === '#' ? 'javascript:void(0)' : esc($href) ?>"
        class="inline-block px-5 py-3 rounded-full font-semibold transition duration-200
               text-slate-700
               bg-white/10 backdrop-blur-md border border-white/40
               hover:bg-white/20 hover:border-white/50">
        <?= esc($label) ?>
    </a>

<?php else: ?>
    <button type="button"
        class="px-5 py-3 rounded-full font-semibold transition duration-200
               text-slate-700
               bg-white/10 backdrop-blur-md border border-white/40
               hover:bg-white/20 hover:border-white/50">
        <?= esc($label) ?>
    </button>
<?php endif; ?>