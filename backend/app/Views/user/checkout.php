<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white font-sans">

    <section class="max-w-3xl mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Checkout</h1>

        <!-- Back Button -->
        <a href="/cart" class="inline-block mb-6 px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">
            ← Back to Cart
        </a>

        <!-- User Info -->
        <div class="bg-gray-800 p-4 rounded mb-6">
            <h2 class="text-xl font-semibold mb-3">Customer Info</h2>

            <?php
            $user = $session->get('user');
            $fullName = trim($user['first_name'] . ' ' . ($user['middle_name'] ?? '') . ' ' . $user['last_name']);
            ?>
            <p><strong>Name:</strong> <?= esc($fullName) ?></p>

            <p><strong>Email:</strong> <?= esc($session->get('user')['email']) ?></p>
        </div>

        <form action="/checkout/place" method="POST">

            <h2 class="text-xl font-semibold mb-2">Order Summary</h2>

            <div class="bg-gray-800 p-4 rounded space-y-2">
                <?php $total = 0;
                foreach ($cart as $item): ?>
                    <div class="flex justify-between">
                        <span><?= esc($item['title']) ?> x<?= $item['qty'] ?></span>
                        <span>₱<?= $item['price'] * $item['qty'] ?></span>
                    </div>
                    <?php $total += $item['price'] * $item['qty']; ?>
                <?php endforeach; ?>

                <hr class="border-gray-600 my-2">

                <div class="flex justify-between font-bold">
                    <span>Total</span>
                    <span>₱<?= $total ?></span>
                </div>
            </div>

            <button type="submit" class="mt-6 px-6 py-3 bg-blue-500 rounded hover:bg-blue-400 font-semibold w-full">
                Place Order
            </button>

        </form>
    </section>

</body>

</html>