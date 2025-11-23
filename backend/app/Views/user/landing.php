<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara — Moonlit Floristry</title>
    <link rel="shortcut icon" type="image/png" href="/assets/lunaraMoonIcon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: radial-gradient(circle at top,
                    #0d1b2a 0%,
                    #122639 40%,
                    #1b3b52 100%);
            overflow-x: hidden;
            color: #e6f7ff;
            font-family: 'Poppins', sans-serif;
        }

        .header-title {
            letter-spacing: 0.05em;
            color: #9cd8ff;
            text-shadow: 0 0 8px rgba(180, 230, 255, 0.7);
        }

        .card-hover:hover {
            transform: translateY(-6px);
        }

        /* ❄ Dark Arctic Floating Ice Orb (Seel-Inspired) */
        .moon-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 150vh;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .moon {
            position: sticky;
            top: 18vh;
            left: 50%;
            transform: translateX(-50%);
            width: 160px;
            height: 160px;

            /* Much darker icy tones */
            background: radial-gradient(circle at 40% 40%,
                    #8fa6b8,
                    #6c8295 55%,
                    #4a5a67 100%);

            border-radius: 50%;

            /* Extremely reduced glow */
            box-shadow: 0 0 20px 4px rgba(100, 130, 150, 0.15);

            filter: brightness(0.55);
            animation: floatIce 10s ease-in-out infinite alternate;
        }

        @keyframes floatIce {
            0% {
                transform: translate(-50%, 0) scale(1);
                filter: brightness(1);
            }

            100% {
                transform: translate(-50%, -22px) scale(1.03);
                filter: brightness(1.08);
            }
        }

        /* ❄ Snow Particles – darker environment, softer white */
        .stars::before,
        .stars::after {
            content: "";
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ffffffd0;
            border-radius: 50%;
            box-shadow:
                120px 60px #ffffffaa, 280px 100px #ffffffaa,
                480px 140px #ffffffcc, 720px 90px #ffffffaa,
                950px 130px #ffffffcc, 200px 190px #ffffffaa,
                610px 230px #ffffffaa, 820px 210px #ffffffaa,
                430px 270px #ffffffcc;
            animation: snowfall 4s infinite ease-in-out alternate;
            opacity: 0.85;
        }

        @keyframes snowfall {

            0%,
            100% {
                opacity: 0.9;
                transform: translateY(0);
            }

            50% {
                opacity: 0.4;
                transform: translateY(10px);
            }
        }

        section {
            scroll-margin-top: 80px;
        }

        /* ❄ Arctic Ice Gradient Text – darker version */
        .text-gradient {
            background: linear-gradient(90deg, #a8e0ff, #d2f3ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

</head>

<body class="text-gray-100 relative">

    <!-- Header -->
    <div class="text-center">
        <?= view('components/header') ?>
    </div>

    <!-- Hero Section -->
    <section class="relative text-center py-32 px-6 bg-gradient-to-b from-transparent to-[#c7e6f5]/40 overflow-hidden">
        <div class="moon-container">
            <div class="stars"></div>
            <div class="moon"></div>
        </div>

        <div class="relative z-10">
            <h2 class="text-5xl md:text-6xl font-extrabold text-gradient mb-6 drop-shadow-lg">
                Bloom in the Arctic Glow
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gradient">
                Welcome to <strong>Lunara</strong> — where floristry meets the calm, icy elegance of the Arctic seas.
            </p>
            <a href="#products"
                class="mt-8 inline-block bg-sky-300 hover:bg-sky-400 px-8 py-3 rounded-full font-semibold text-gray-900 transition">
                Explore Collection
            </a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="bg-white/10 backdrop-blur-xl py-20 text-gray-900">
        <div class="mx-auto px-4 max-w-6xl">
            <h3 class="mb-12 font-bold text-4xl text-center header-title">Arctic Bloom Collection</h3>

            <div class="grid md:grid-cols-3 gap-8">
                <?= view('components/cards/product_card', [
                    'title' => 'Lunar Lilies',
                    'description' => 'Elegant white lilies that bloom like moonlight — perfect for calm evenings and graceful gifts.',
                    'price' => '₱299',
                    'image' => 'https://s.turbifycdn.com/aah/snowcreek/moon-garden-lily-bulb-collection-18-bulbs-22.png',
                    'link' => '/shop'
                ]) ?>

                <?= view('components/cards/product_card', [
                    'title' => 'Midnight Roses',
                    'description' => 'Deep purple roses that capture the essence of twilight and mystery.',
                    'price' => '₱349',
                    'image' => 'https://i.etsystatic.com/34146895/r/il/6b42c8/6329788818/il_fullxfull.6329788818_4af6.jpg',
                    'link' => '/shop'
                ]) ?>

                <?= view('components/cards/product_card', [
                    'title' => 'Starlit Daisies',
                    'description' => 'Bright daisies that shimmer under moonlight — a touch of magic for your space.',
                    'price' => '₱259',
                    'image' => 'https://www.oderings.co.nz/assets/Argranthemum-Sassy-Red-web_T_144491_5.jpg',
                    'link' => '/shop'
                ]) ?>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <div class="text-center">
        <?= view('components/footer') ?>
    </div>

</body>

</html>