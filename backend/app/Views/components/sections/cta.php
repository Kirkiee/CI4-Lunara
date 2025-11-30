<?php
// Component: components/sections/call_to_action.php
// Data contract:
// $heading: string
// $sub: string|null
// $primary: object
// $secondary: object|null

$heading ??= 'Join the Lunara Experience';
$sub ??= 'Stay inspired under the moonlight. Subscribe to our newsletter for design updates and new collections.';
$primary ??= ['label' => 'Get Started', 'href' => '#'];
$secondary ??= null;
?>

<section class="relative bg-white/10 backdrop-blur-2xl 
                border border-white/30 
                rounded-3xl p-10 mt-20 
                shadow-lg overflow-hidden">

    <!-- Softer ambient background glow -->
    <div class="absolute inset-0 
                bg-gradient-to-b from-indigo-300/10 via-transparent to-blue-200/10 
                blur-2xl opacity-40 pointer-events-none">
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center max-w-3xl mx-auto">
        <?php if (!empty($heading)): ?>
            <h2 class="text-4xl md:text-5xl font-extrabold 
                        bg-gradient-to-r from-indigo-200 to-purple-200
                        bg-clip-text text-transparent drop-shadow-sm mb-4">
                <?= esc($heading) ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($sub)): ?>
            <p class="text-slate-200/90 mb-8 text-lg leading-relaxed">
                <?= esc($sub) ?>
            </p>
        <?php endif; ?>

        <div class="flex justify-center gap-4 mt-4">

            <!-- Arctic Primary Button -->
            <?php if (!empty($primary)): ?>
                <a href="<?= esc($primary['href']) ?>"
                    class="px-6 py-3 rounded-full font-semibold text-slate-900
                          bg-gradient-to-r from-blue-200/70 to-indigo-200/70
                          hover:from-blue-300/80 hover:to-indigo-300/80
                          backdrop-blur-md border border-white/40 shadow-sm
                          transition duration-200">
                    <?= esc($primary['label']) ?>
                </a>
            <?php endif; ?>

            <!-- Arctic Secondary Button -->
            <?php if (!empty($secondary)): ?>
                <a href="<?= esc($secondary['href']) ?>"
                    class="px-6 py-3 rounded-full font-semibold text-indigo-200
                          bg-transparent border border-indigo-300/50
                          hover:bg-indigo-300/10 transition duration-200">
                    <?= esc($secondary['label']) ?>
                </a>
            <?php endif; ?>

        </div>
    </div>
</section>