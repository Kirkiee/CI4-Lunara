<?php
// Component: components/cards/roadmap_card.php
// Data contract:
// $title: string
// $description: string
// $status: string
// $priority: string
// $statusClass: string
?>

<article class="panel transition-transform duration-300 hover:-translate-y-1 hover:shadow-[0_12px_28px_rgba(10,25,60,0.7)]">

    <!-- Title and Status -->
    <?php if (!empty($title)): ?>
        <div class="flex justify-between items-start mb-4">
            <h4 class="text-2xl font-bold text-gradient header-title">
                <?= esc($title) ?>
            </h4>
            <?php if (!empty($statusClass) && !empty($status)): ?>
                <span class="status-badge <?= esc($statusClass) ?>">
                    <?= esc($status) ?>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Description -->
    <?php if (!empty($description)): ?>
        <p class="text-gray-200 flex-grow mb-4 text-sm leading-relaxed">
            <?= esc($description) ?>
        </p>
    <?php endif; ?>

    <!-- Priority and Button -->
    <div class="flex justify-between items-center mt-auto">
        <?php if (!empty($priority)): ?>
            <span class="text-[#8ecae6] font-medium text-sm">
                Priority: <?= esc($priority) ?>
            </span>
        <?php endif; ?>
        <a href="#" class="bg-[#8ecae6] hover:bg-[#a8dadc] px-4 py-2 rounded-full text-[#0a1a2a] text-sm font-semibold transition-colors">
            View
        </a>
    </div>

</article>