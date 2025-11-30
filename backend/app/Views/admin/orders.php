<?php $session = session(); ?>
<?php $current = uri_string(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara Admin — Orders</title>
    <link rel="shortcut icon" type="image/png" href="/assets/lunaraMoonIcon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: radial-gradient(circle at top, #0a1a2a 0%, #0f2338 40%, #274862 100%);
            font-family: 'Poppins', sans-serif;
            color: #eef7fa;
        }

        .text-gradient {
            background: linear-gradient(90deg, #8ecae6, #a8dadc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .panel {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 1.5rem;
            box-shadow: 0 6px 22px rgba(10, 25, 60, 0.5);
            display: flex;
            flex-direction: column;
        }

        table th,
        table td {
            padding: 0.75rem 1rem;
        }

        table thead {
            color: #8ecae6;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        }

        table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: background 0.2s ease;
        }

        table tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .status-pending {
            color: #facc15;
            font-weight: 600;
        }

        .status-completed {
            color: #a8dadc;
            font-weight: 600;
        }

        .status-cancelled {
            color: #f87171;
            font-weight: 600;
        }
    </style>
</head>

<body class="flex text-gray-100 min-h-screen relative">

    <!-- Sidebar -->
    <aside class="sidebar w-64 flex flex-col justify-between py-6 px-4 border-r border-white/10 z-10">
        <div>
            <h1 class="text-2xl font-bold text-gradient text-center mb-10">Lunara Admin</h1>
            <nav class="space-y-4">
                <a href="/admin/dashboard" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/dashboard' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🏠 Dashboard</a>
                <a href="/admin/stock" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/stock' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🌸 Flower Stock</a>
                <a href="/admin/orders" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/orders' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🛒 Orders</a>
                <a href="/admin/accounts" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/accounts' ? 'bg-indigo-500/30 font-semibold' : '' ?>">👥 Accounts</a>
            </nav>
        </div>
        <div class="text-center text-sm text-gray-400 border-t border-white/10 pt-4">
            <?php if (!$session->has('user')): ?>
                <a href="/login" class="block btn-arctic mb-3">Login</a>
            <?php else: ?>
                <form action="/logout" method="post">
                    <button type="submit" class="w-full bg-red-500/70 hover:bg-red-500 text-white px-4 py-2 rounded-lg mb-3 transition font-semibold">Logout</button>
                </form>
            <?php endif; ?>
            © <?= date('Y') ?> Lunara
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto relative z-10">
        <div class="mb-10">
            <h2 class="text-4xl font-extrabold text-gradient drop-shadow-lg">Orders</h2>
            <p class="text-gray-300 mt-2">View and manage all customer orders under the moonlight 🌙</p>
        </div>

        <!-- Orders Table -->
        <section class="panel overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total Price</th>
                        <th>Total Quantity</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <?php $items = json_decode(is_string($order->items) ? $order->items : json_encode($order->items), true); ?>
                            <tr>
                                <td>#<?= esc($order->id) ?></td>
                                <td><?= esc($order->customer_name) ?><br><small><?= esc($order->customer_email) ?></small></td>
                                <td>
                                    <?php if (!empty($items)): ?>
                                        <?php foreach ($items as $item): ?>
                                            <?= esc($item['flower']) ?> x<?= esc($item['quantity']) ?><br>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <em>No items</em>
                                    <?php endif; ?>
                                </td>
                                <td>₱<?= number_format($order->price, 2) ?></td>
                                <td><?= esc($order->stock) ?></td>
                                <td class="<?= 'status-' . strtolower($order->status) ?>"><?= esc($order->status) ?></td>
                                <td><?= esc($order->created_at) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-gray-400 py-4">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>