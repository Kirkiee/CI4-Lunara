<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .cart-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .cart-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
        }

        .cart-info h2 {
            font-weight: 600;
            font-size: 1.1rem;
            color: #d2f3ff;
        }

        .cart-info p {
            color: #bcdfff;
        }

        .qty-controls button {
            background: rgba(255, 255, 255, 0.2);
            color: #0a1a2a;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            transition: background 0.3s ease;
        }

        .qty-controls button:hover {
            background: #8ecae6;
        }

        .remove-btn {
            color: #ff6b6b;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .remove-btn:hover {
            text-decoration: underline;
            color: #ff4b4b;
        }

        .checkout-btn {
            background: #8ecae6;
            color: #0a1a2a;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: background 0.3s ease;
            text-align: center;
        }

        .checkout-btn:hover {
            background: #a8dadc;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- Header -->
    <div class="text-center">
        <?= view('components/header') ?>
    </div>

    <!-- Cart Section -->
    <section class="max-w-5xl mx-auto px-4 py-16 flex-1">
        <h1 class="text-4xl font-extrabold text-center mb-10">Your Cart</h1>

        <?php $cart = $session->get('cart') ?? []; ?>

        <?php if (empty($cart)): ?>
            <p class="text-center text-lg text-gray-300">
                Your cart is empty.
                <a href="/shop" class="text-blue-300 underline">Continue shopping</a>.
            </p>
        <?php else: ?>
            <div class="space-y-6">
                <?php foreach ($cart as $id => $item): ?>
                    <div class="cart-card">
                        <img src="<?= esc($item['image']) ?>" alt="<?= esc($item['title']) ?>">
                        <div class="cart-info flex-1">
                            <h2><?= esc($item['title']) ?></h2>
                            <p>₱<?= esc($item['price']) ?></p>
                        </div>
                        <div class="qty-controls flex items-center gap-2">
                            <a href="/cart/decrease/<?= $id ?>" class="px-3 py-1 rounded-full">−</a>
                            <span class="font-bold"><?= $item['qty'] ?></span>
                            <a href="/cart/increase/<?= $id ?>" class="px-3 py-1 rounded-full">+</a>
                        </div>
                        <a href="/cart/remove/<?= $id ?>" class="remove-btn">Remove</a>
                    </div>
                <?php endforeach; ?>

                <!-- Total -->
                <div class="mt-10 text-right">
                    <?php
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['qty'];
                    }
                    ?>
                    <h2 class="text-2xl font-bold mb-4">Total: <span class="text-blue-200">₱<?= $total ?></span></h2>
                    <a href="/checkout" class="checkout-btn">Proceed to Checkout</a>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <!-- Footer -->
    <div class="text-center mt-auto">
        <?= view('components/footer') ?>
    </div>

</body>

</html>