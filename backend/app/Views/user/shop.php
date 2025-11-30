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
        <p class="text-gray-200 max-w-xl mx-auto">
            Discover our curated selection of flowers that bloom under the calm Arctic moonlight. Add your favorites to your cart and enjoy the magic of Lunara.
        </p>
    </section>

    <!-- Products Grid (Dynamic) -->
    <section id="products" class="mx-auto px-4 max-w-6xl py-8 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Products will be loaded here via JS -->
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

    <!-- JS to fetch products dynamically -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('/shop/fetch', {
                    method: 'POST'
                })
                .then(res => res.json())
                .then(products => {
                    const container = document.getElementById('products');

                    if (products.length === 0) {
                        container.innerHTML = '<p class="col-span-full text-center text-gray-300">No products available.</p>';
                        return;
                    }

                    container.innerHTML = products.map(p => `
                        <div class="product-card" data-id="${p.id}">
                            <img src="${p.image || '/assets/default_flower.png'}" class="product-img" />
                            <div class="product-info">
                                <h3 class="product-title">${p.flower}</h3>
                                <p class="product-desc">${p.category}</p>
                                <p class="product-price">₱${p.price}</p>
                                <button class="btn-add">Add to Cart</button>
                            </div>
                        </div>
                    `).join('');

                    // Add to Cart functionality
                    document.querySelectorAll('.btn-add').forEach(btn => {
                        btn.addEventListener('click', () => {
                            const productCard = btn.closest('.product-card');
                            const productId = productCard.dataset.id;

                            fetch('/cart/add', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                        'X-Requested-With': 'XMLHttpRequest'
                                    },
                                    body: `id=${productId}`
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        btn.textContent = 'Added ✓';
                                        btn.disabled = true;
                                        setTimeout(() => {
                                            btn.textContent = 'Add to Cart';
                                            btn.disabled = false;
                                        }, 1500);
                                    } else {
                                        alert('Failed to add to cart');
                                    }
                                })
                                .catch(err => console.error(err));
                        });
                    });
                })
                .catch(err => console.error(err));
        });
    </script>

</body>

</html>