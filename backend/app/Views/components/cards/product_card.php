<?php
// Component: components/cards/product_card.php
// Data contract:
// $title: string
// $description: string
// $price: float
// $image: string
// $link: string (URL to product/shop page)
?>

<a href="<?= esc($link ?? '#') ?>" class="flex-1 block h-full">
    <article class="flex flex-col 
                    h-full
                    bg-white/10 backdrop-blur-xl 
                    border border-white/30 
                    rounded-2xl shadow-md 
                    hover:shadow-xl hover:border-white/40
                    transition-all duration-300 p-6">

        <!-- Image Section -->
        <div class="flex justify-center items-center 
                    bg-gradient-to-br from-blue-200/20 to-indigo-300/20
                    mb-4 rounded-xl w-full h-56 overflow-hidden">

            <?php if (!empty($image)): ?>
                <img src="<?= esc($image) ?>"
                    alt="<?= esc($title ?? '') ?>"
                    class="rounded-xl w-full h-full object-cover"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <?php endif; ?>

            <!-- Fallback Icon -->
            <div class="hidden flex justify-center items-center 
                        bg-white/10 backdrop-blur-md 
                        rounded-xl w-full h-56 text-4xl text-indigo-200">
                🌙
            </div>
        </div>

        <!-- Title -->
        <?php if (!empty($title)): ?>
            <h4 class="mb-2 font-semibold text-2xl text-indigo-100 drop-shadow-sm">
                <?= esc($title) ?>
            </h4>
        <?php endif; ?>

        <!-- Description -->
        <?php if (!empty($description)): ?>
            <p class="flex-grow mb-4 text-slate-200/90 leading-relaxed">
                <?= esc($description) ?>
            </p>
        <?php endif; ?>

        <!-- Price + Buy Button -->
        <div class="flex justify-between items-center mt-auto">
            <span class="font-bold text-xl text-indigo-200 drop-shadow-sm">
                ₱<?= esc($price) ?>
            </span>

            <span class="px-4 py-2 rounded-full font-semibold text-slate-900 text-sm
                         bg-gradient-to-r from-blue-200/70 to-indigo-200/70
                         hover:from-blue-300/80 hover:to-indigo-300/80
                         backdrop-blur-md border border-white/40 shadow-sm
                         transition duration-200">
                Add to Cart
            </span>
        </div>

    </article>
</a>