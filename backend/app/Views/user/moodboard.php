<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara — Moodboard</title>
    <link rel="shortcut icon" type="image/png" href="/assets/lunaraMoonIcon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(180deg, #0a1a2a 0%, #0f2338 40%, #274862 100%);
            overflow-x: hidden;
            color: #eef7fa;
        }

        .header-title {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.05em;
        }

        .text-gradient {
            background: linear-gradient(90deg, #8ecae6, #a8dadc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ❄ Arctic Moon (matches login/signup versions) */
        .moon {
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            background: radial-gradient(circle at 40% 40%,
                    #99cfe0,
                    #6699b2 60%,
                    #336680 100%);
            border-radius: 50%;
            box-shadow: 0 0 50px 15px rgba(100, 150, 200, 0.2);
            opacity: 0.55;
            filter: blur(1px);
            animation: floatMoon 10s ease-in-out infinite alternate;
            z-index: 0;
        }

        @keyframes floatMoon {
            0% {
                transform: translate(-50%, 0);
            }

            100% {
                transform: translate(-50%, -15px);
            }
        }

        /* Subtle hover lift */
        .card-hover:hover {
            transform: translateY(-6px);
        }

        /* Moodboard grid layout */
        .mb-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2.5rem;
            align-items: stretch;
        }

        @media (min-width: 1024px) {
            .mb-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-auto-flow: row dense;
                align-items: stretch;
            }
        }

        /* ❄ Frosted Arctic Panel */
        .panel {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 1.5rem;
            border-radius: 14px;
            box-shadow: 0 6px 22px rgba(10, 25, 60, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 340px;
            backdrop-filter: blur(12px);
        }

        .panel h3 {
            margin-bottom: 1rem;
            min-height: 2.5rem;
        }
    </style>
</head>

<body class="relative">

    <div class="moon"></div>

    <!-- Header -->
    <div class="text-center">
        <?= view('components/header') ?>
    </div>

    <!-- Main moodboard container -->
    <main class="max-w-7xl mx-auto px-6 py-16 relative z-10">

        <h2 class="text-5xl font-extrabold text-gradient text-center mb-10">Lunara — Moodboard</h2>
        <p class="text-center text-gray-300 max-w-3xl mx-auto mb-12">
            Arctic design system and visual references: color, typography, UI components and logo variations —
            presented using Lunara’s frost-washed theme.
        </p>

        <!-- Grid layout -->
        <section class="mb-grid">

            <!-- Color System -->
            <div class="panel">
                <div>
                    <h3 class="text-2xl font-bold text-[#a8dadc] mb-4">Color System</h3>
                    <div class="flex items-center gap-4 flex-wrap">
                        <div class="w-20 h-20 rounded-lg bg-[#8ecae6] border border-white/20"></div>
                        <div class="w-20 h-20 rounded-lg bg-[#a8dadc] border border-white/20"></div>
                        <div class="w-20 h-20 rounded-lg bg-[#0a1a2a] border border-white/20"></div>
                    </div>
                    <div class="mt-4 text-gray-200 text-sm">
                        <p><strong>Glacier Blue</strong> — #8ecae6</p>
                        <p><strong>Frostmint</strong> — #a8dadc</p>
                        <p><strong>Deep Arctic</strong> — #0a1a2a</p>
                    </div>
                </div>
            </div>

            <!-- Typography -->
            <div class="panel">
                <div>
                    <h3 class="text-2xl font-bold text-[#a8dadc] mb-4">Typography</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-3xl font-bold header-title text-gradient">Poppins</p>
                            <p class="text-sm text-gray-300">Used for headings, logos and emphasis.</p>
                        </div>
                        <div>
                            <p class="text-lg font-medium"
                                style="font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;">
                                Inter
                            </p>
                            <p class="text-sm text-gray-300">Used for body copy and UI labels for legibility.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="panel">
                <div>
                    <h3 class="text-2xl font-bold text-[#a8dadc] mb-4">Buttons</h3>
                    <div class="flex flex-wrap gap-4 items-center">
                        <?= view('components/buttons/button_primary', ['label' => 'Primary', 'href' => '#']) ?>
                        <?= view('components/buttons/button_secondary', ['label' => 'Secondary', 'href' => '#']) ?>
                        <?= view('components/buttons/button_border', ['label' => 'Border', 'href' => '#']) ?>
                        <?= view('components/buttons/button_primary', ['label' => 'Disabled', 'disable' => true]) ?>
                    </div>
                    <p class="mt-4 text-gray-300 text-sm">
                        Buttons are adapted to icy gradients and clean Arctic outlines.
                    </p>
                </div>
            </div>

            <!-- Card Samples -->
            <div class="panel lg:col-span-2">
                <div>
                    <h3 class="text-2xl font-bold text-[#a8dadc] mb-6">Card Samples</h3>
                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <?= view('components/cards/product_card', [
                            'title' => 'Frost Lilies',
                            'description' => 'Soft white lilies with cold-blue tones — serene and elegant.',
                            'price' => '₱299',
                            'image' => 'https://s.turbifycdn.com/aah/snowcreek/moon-garden-lily-bulb-collection-18-bulbs-22.png'
                        ]) ?>
                        <?= view('components/cards/product_card', [
                            'title' => 'Polar Roses',
                            'description' => 'Cool-toned purple roses representing icy twilight.',
                            'price' => '₱349',
                            'image' => 'https://i.etsystatic.com/34146895/r/il/6b42c8/6329788818/il_fullxfull.6329788818_4af6.jpg'
                        ]) ?>
                        <?= view('components/cards/product_card', [
                            'title' => 'Snowlight Daisies',
                            'description' => 'Bright daisies with gentle Arctic shimmer.',
                            'price' => '₱259',
                            'image' => 'https://www.oderings.co.nz/assets/Argranthemum-Sassy-Red-web_T_144491_5.jpg'
                        ]) ?>
                    </div>
                </div>
            </div>

            <!-- Logos -->
            <div class="panel">
                <div>
                    <h3 class="text-2xl font-bold text-[#a8dadc] mb-4">Logos</h3>
                    <div class="flex gap-6 items-center flex-wrap">

                        <!-- Circle Logo -->
                        <div class="flex flex-col items-center">
                            <div
                                class="w-28 h-28 rounded-full bg-white/10 border border-white/20 flex items-center justify-center overflow-hidden">
                                <img src="assets/LunaraMoonIcon.png" alt="Lunara Circle Logo"
                                    class="w-20 h-20 object-contain">
                            </div>
                            <p class="mt-3 text-gray-300 text-sm">Circle Logo</p>
                        </div>

                        <!-- Square Logo -->
                        <div class="flex flex-col items-center">
                            <div
                                class="w-28 h-28 bg-white/10 border border-white/20 rounded-2xl flex items-center justify-center overflow-hidden">
                                <img src="assets/LunaraMoonSquare.png" alt="Lunara Square Logo"
                                    class="w-20 h-20 object-contain">
                            </div>
                            <p class="mt-3 text-gray-300 text-sm">Square Logo</p>
                        </div>

                    </div>
                    <p class="mt-4 text-gray-300 text-sm">Lunara’s Arctic-styled logo set</p>
                </div>
            </div>

        </section>

    </main>

    <!-- CTA Section -->
    <?= view('components/sections/cta', [
        'title' => 'Enter Lunara’s Arctic Realm',
        'subtitle' => 'Frosted elegance, moonlit designs, and a calm winter aesthetic.',
        'buttonLabel' => 'Explore Now',
        'buttonHref' => '/'
    ]) ?>

    <!-- Footer -->
    <div class="text-center">
        <?= view('components/footer') ?>
    </div>

</body>

</html>