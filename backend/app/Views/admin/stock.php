<?php
$session = session();
$current = uri_string();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunara Admin — Stock Management</title>

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
            transition: .3s;
        }

        .panel:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(10, 25, 60, 0.7);
        }

        .btn-arctic {
            background: #8ecae6;
            color: #0a1a2a;
            padding: .5rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-arctic:hover {
            background: #a8dadc;
        }

        table th,
        table td {
            padding: .75rem 1rem;
        }

        table tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .status-instock {
            color: #a8dadc;
            font-weight: 600;
        }

        .status-low {
            color: #facc15;
            font-weight: 600;
        }

        .status-out {
            color: #f87171;
            font-weight: 600;
        }

        .moon {
            position: absolute;
            top: 10%;
            right: 5%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, #99cfe0, #6699b2 60%, #336680);
            border-radius: 50%;
            opacity: .55;
            filter: blur(1px);
            animation: floatMoon 10s ease-in-out infinite alternate;
        }

        @keyframes floatMoon {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-15px);
            }
        }

        .input-field {
            width: 100%;
            padding: 10px;
            background: #1f2937;
            border: 1px solid #374151;
            border-radius: 8px;
            color: white;
        }
    </style>
</head>

<body class="relative flex min-h-screen">

    <!-- Sidebar -->
    <aside class="z-10 flex flex-col justify-between px-4 py-6 border-white/10 border-r w-64"
        style="background: rgba(255,255,255,0.05); backdrop-filter: blur(12px);">

        <div>
            <h1 class="mb-10 font-bold text-gradient text-2xl text-center">Lunara Admin</h1>

            <nav class="space-y-4">
                <a href="/admin/dashboard" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 <?= $current == 'admin/dashboard' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🏠 Dashboard</a>
                <a href="/admin/stock" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 <?= $current == 'admin/stock' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🌸 Flower Stock</a>
                <a href="/admin/orders" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 <?= $current == 'admin/orders' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🛒 Orders</a>
                <a href="/admin/accounts" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 <?= $current == 'admin/accounts' ? 'bg-indigo-500/30 font-semibold' : '' ?>">👥 Accounts</a>
                <a href="/admin/request" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 <?= $current == 'admin/request' ? 'bg-indigo-500/30 font-semibold' : '' ?>">📩 Requests</a>
            </nav>
        </div>

        <div class="pt-4 border-white/10 border-t text-gray-400 text-sm text-center">
            <?php if (!$session->has('user')): ?>
                <a href="/login" class="block mb-3 btn-arctic">Login</a>
            <?php else: ?>
                <form action="/logout" method="post">
                    <button type="submit" class="bg-red-500/70 hover:bg-red-500 mb-3 px-4 py-2 rounded-lg w-full font-semibold text-white">
                        Logout
                    </button>
                </form>
            <?php endif; ?>
            © <?= date('Y') ?> Lunara
        </div>
    </aside>

    <!-- Main Content -->
    <main class="relative flex-1 p-8 overflow-y-auto">
        <div class="moon"></div>

        <h2 class="drop-shadow-lg font-extrabold text-gradient text-4xl">Stock Management</h2>
        <p class="mt-2 text-gray-300">Monitor and update your flower inventory under the moonlight 🌙</p>

        <!-- Stock Table -->
        <section class="mt-8 panel">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-[#8ecae6] text-2xl">Inventory List</h3>
                <button class="btn-arctic" onclick="document.getElementById('addStockModal').showModal();">
                    + Add Stock
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($stocks)): ?>
                            <?php foreach ($stocks as $item): ?>
                                <tr>
                                    <td class="px-4 py-3">
                                        <?= esc($item->flower) ?>
                                    </td>

                                    <td class="px-4 py-3"><?= esc($item->category) ?></td>
                                    <td class="px-4 py-3">₱<?= number_format($item->price, 2) ?></td>
                                    <td class="px-4 py-3"><?= esc($item->stock) ?></td>
                                    <td class="py-3 px-4 <?= $item->status === 'Available' ? 'status-instock' : ($item->status === 'Low Stock' ? 'status-low' : 'status-out') ?>">
                                        <?= esc($item->status) ?>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <button class="text-[#8ecae6] hover:text-[#a8dadc]">Adjust</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="py-4 text-gray-400 text-center">No stock items found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <!-- Add Stock Modal -->
    <dialog id="addStockModal" class="bg-gray-900/90 backdrop:bg-black/60 p-6 rounded-xl w-96">
        <h3 class="mb-4 font-bold text-[#8ecae6] text-2xl">Add New Stock</h3>

        <form method="post" action="/admin/stock/create" class="space-y-4">
            <?= csrf_field() ?>
            <input type="text" name="flower" placeholder="Flower Name" class="input-field" required>
            <input type="text" name="category" placeholder="Category" class="input-field" required>
            <input type="number" step="0.01" name="price" placeholder="Price" class="input-field" required>
            <input type="number" name="stock" placeholder="Stock Quantity" class="input-field" required>
            <select name="status" class="input-field" required>
                <option value="Available">Available</option>
                <option value="Low Stock">Low Stock</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="document.getElementById('addStockModal').close();" class="bg-gray-600 btn-arctic">
                    Cancel
                </button>
                <button type="submit" class="btn-arctic">Add Stock</button>
            </div>
        </form>
    </dialog>

</body>

</html>