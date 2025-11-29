<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara — Shop</title>
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

        /* Product card styling */
        .product-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        .product-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .product-info {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .product-title {
            font-weight: 600;
            font-size: 1.25rem;
            color: #d2f3ff;
        }

        .product-desc {
            font-size: 0.95rem;
            color: #bcdfff;
            flex-grow: 1;
        }

        .product-price {
            font-weight: 700;
            color: #a8e0ff;
            font-size: 1.15rem;
        }

        .btn-add {
            background: #8ecae6;
            color: #0a1a2a;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: background 0.3s ease;
            text-align: center;
        }

        .btn-add:hover {
            background: #a8dadc;
        }

        /* Arctic moon decorations */
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
            background: radial-gradient(circle at 40% 40%, #8fa6b8, #6c8295 55%, #4a5a67 100%);
            border-radius: 50%;
            box-shadow: 0 0 20px 4px rgba(100, 130, 150, 0.15);
            filter: brightness(0.55);
            animation: floatIce 10s ease-in-out infinite alternate;
        }

        @keyframes floatIce {
            0% {
                transform: translate(-50%, 0) scale(1);
            }

            100% {
                transform: translate(-50%, -22px) scale(1.03);
            }
        }

        section {
            scroll-margin-top: 80px;
        }
    </style>
</head>

<body class="text-gray-100 relative">

    <!-- Header -->
    <div class="text-center">
        <?= view('components/header') ?>
    </div>

    <!-- Shop Title -->
    <section class="text-center py-16">
        <h1 class="text-4xl md:text-5xl font-extrabold header-title mb-4">Arctic Bloom Shop</h1>
        <p class="text-gray-200 max-w-xl mx-auto">Discover our curated selection of flowers that bloom under the calm Arctic moonlight. Add your favorites to your cart and enjoy the magic of Lunara.</p>
    </section>

    <!-- Products Grid -->
    <section class="mx-auto px-4 max-w-6xl py-8 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        <?= view('components/cards/product_card', [
            'title' => 'Lunar Lilies',
            'description' => 'Elegant white lilies that bloom like moonlight — perfect for calm evenings and graceful gifts.',
            'price' => '299',
            'image' => 'https://s.turbifycdn.com/aah/snowcreek/moon-garden-lily-bulb-collection-18-bulbs-22.png'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Midnight Roses',
            'description' => 'Deep purple roses that capture the essence of twilight and mystery.',
            'price' => '349',
            'image' => 'https://i.etsystatic.com/34146895/r/il/6b42c8/6329788818/il_fullxfull.6329788818_4af6.jpg'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Starlit Daisies',
            'description' => 'Bright daisies that shimmer under moonlight — a touch of magic for your space.',
            'price' => '259',
            'image' => 'https://www.oderings.co.nz/assets/Argranthemum-Sassy-Red-web_T_144491_5.jpg'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Frostpetal Orchids',
            'description' => 'Icy blue orchids that shimmer like frost under the northern lights.',
            'price' => '329',
            'image' => 'https://blacksheepperennials.com/cdn/shop/files/Lamium_OrchidFrost.png?v=1751392662'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Aurora Peonies',
            'description' => 'Soft pastel peonies glowing gently like the aurora horizon.',
            'price' => '379',
            'image' => 'https://wholesalefloristdirect.co.uk/wp-content/uploads/2025/06/aurora-peony-ivory.jpg'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Glacier Hydrangeas',
            'description' => 'Cool-toned hydrangeas reminiscent of Arctic glacier ice.',
            'price' => '289',
            'image' => 'https://lgrmag.com/wp-content/uploads/2023/01/Monrovia-Hydrangea-macrophylla-Seaside-Serenade-Glacier-1024x1024.jpeg'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Moonshadow Tulips',
            'description' => 'Dark violet tulips with silvery moonlit edges.',
            'price' => '319',
            'image' => 'https://novelnovicetwilight.wordpress.com/wp-content/uploads/2009/04/100_2455.jpg'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Crystal Petunias',
            'description' => 'Soft crystal-blue blooms that sparkle like frozen dew.',
            'price' => '249',
            'image' => 'https://glenleagreenhouses.com/cdn/shop/products/Petunia_Headliner_Crystal_Sky.jpg?v=1644943013'
        ]) ?>

        <?= view('components/cards/product_card', [
            'title' => 'Polar Blossoms',
            'description' => 'A rare Arctic bloom with delicate white petals and a gentle glow.',
            'price' => '359',
            'image' => 'https://www.applewoodseed.com/wp-content/uploads/2016/11/ZEPB-1001.jpg'
        ]) ?>

    </section>

    <div class="text-center mt-12">
        <a href="/cart"
            class="inline-block bg-sky-300 hover:bg-sky-400 px-8 py-3 rounded-full 
              font-semibold text-gray-900 transition shadow-lg">
            View Cart & Checkout
        </a>
    </div>

    <!-- Footer -->
    <div class="text-center mt-12">
        <?= view('components/footer') ?>
    </div>

</body>

</html>