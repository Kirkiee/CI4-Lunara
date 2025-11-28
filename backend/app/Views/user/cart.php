<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara — Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: radial-gradient(circle at top,
                    #0d1b2a 0%,
                    #122639 40%,
                    #1b3b52 100%);
            color: #e6f7ff;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<!-- FIX: min-h-screen flex flex-col -->

<body class="min-h-screen flex flex-col">

    <!-- Header -->
    <div class="text-center">
        <?= view('components/header') ?>
    </div>

    <section class="max-w-5xl mx-auto px-4 py-16 flex-1">
        <h1 class="text-4xl font-extrabold text-center mb-10">Your Cart</h1>

        <?php $cart = $session->get('cart') ?? []; ?>

        <?php if (empty($cart)): ?>
            <p class="text-center text-lg text-gray-300">
                Your cart is empty.
                <a href="/shop" class="text-blue-300 underline">Continue shopping</a>.
            </p>
        <?php else: ?>

            <!-- Cart Items -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 
                        rounded-2xl p-6 shadow-lg">

                <div class="space-y-6">
                    <?php foreach ($cart as $id => $item): ?>
                        <div class="flex items-center justify-between bg-white/5 p-4 rounded-xl">

                            <div class="flex gap-4 items-center">
                                <img src="<?= esc($item['image']) ?>"
                                    class="w-20 h-20 rounded-xl object-cover">

                                <div>
                                    <h2 class="text-xl font-semibold"><?= esc($item['title']) ?></h2>
                                    <p class="text-blue-200">₱<?= esc($item['price']) ?></p>
                                </div>
                            </div>

                            <!-- Quantity Controls -->
                            <div class="flex items-center gap-3">
                                <a href="/cart/decrease/<?= $id ?>"
                                    class="px-3 py-1 bg-white/20 rounded-lg">−</a>

                                <span class="text-lg font-bold"><?= $item['qty'] ?></span>

                                <a href="/cart/increase/<?= $id ?>"
                                    class="px-3 py-1 bg-white/20 rounded-lg">+</a>
                            </div>

                            <!-- Remove -->
                            <a href="/cart/remove/<?= $id ?>"
                                class="text-red-300 font-semibold hover:underline">
                                Remove
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Total -->
                <div class="mt-10 text-right">
                    <?php
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['qty'];
                    }
                    ?>

                    <h2 class="text-2xl font-bold">
                        Total: <span class="text-blue-200">₱<?= $total ?></span>
                    </h2>

                    <a href="/checkout"
                        class="mt-4 inline-block px-8 py-3 rounded-full 
                               bg-blue-300 text-slate-900 font-semibold 
                               hover:bg-blue-200 transition">
                        Proceed to Checkout
                    </a>
                </div>
            </div>

        <?php endif; ?>
    </section>

    <!-- Footer (FIX: mt-auto for sticky bottom) -->
    <div class="text-center mt-auto">
        <?= view('components/footer') ?>
    </div>

</body>

</html>