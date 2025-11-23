<?php $session = session(); ?>
<?php $current = uri_string(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara Admin Dashboard</title>
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

        .card-hover:hover {
            transform: translateY(-6px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
        }

        .panel {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 1.5rem;
            box-shadow: 0 6px 22px rgba(10, 25, 60, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .panel:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(10, 25, 60, 0.7);
        }

        .btn-arctic {
            background: #8ecae6;
            color: #0a1a2a;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .btn-arctic:hover {
            background: #a8dadc;
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

        .status-active {
            color: #a8dadc;
            font-weight: 600;
        }

        .status-inactive {
            color: #8ecae6;
            font-weight: 600;
        }

        .moon {
            position: absolute;
            top: 10%;
            right: 5%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle at 40% 40%, #99cfe0, #6699b2 60%, #336680 100%);
            border-radius: 50%;
            box-shadow: 0 0 50px 15px rgba(100, 150, 200, 0.2);
            opacity: 0.55;
            filter: blur(1px);
            animation: floatMoon 10s ease-in-out infinite alternate;
            z-index: 0;
        }

        @keyframes floatMoon {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>

<body class="flex text-gray-100 min-h-screen relative">

    <!-- 🌙 Sidebar -->
    <aside class="sidebar w-64 flex flex-col justify-between py-6 px-4 border-r border-white/10 z-10">
        <div>
            <h1 class="text-2xl font-bold text-gradient text-center mb-10">Lunara Admin</h1>

            <nav class="space-y-4">
                <a href="/admin/dashboard" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/dashboard' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🏠 Dashboard</a>
                <a href="/admin/stock" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/stock' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🌸 Flower Stock</a>
                <a href="/admin/orders" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/orders' ? 'bg-indigo-500/30 font-semibold' : '' ?>">🛒 Orders</a>
                <a href="/admin/accounts" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/accounts' ? 'bg-indigo-500/30 font-semibold' : '' ?>">👥 Accounts</a>
                <a href="/admin/request" class="block px-4 py-2 rounded-lg hover:bg-indigo-500/20 transition <?= $current == 'admin/request' ? 'bg-indigo-500/30 font-semibold' : '' ?>">📩 Requests</a>
            </nav>
        </div>

        <div class="text-center text-sm text-gray-400 border-t border-white/10 pt-4">
            <?php if (!$session->has('user')): ?>
                <a href="/login" class="block btn-arctic mb-3">Login</a>
            <?php else: ?>
                <form action="/logout" method="post">
                    <button type="submit" class="w-full bg-red-500/70 hover:bg-red-500 text-white px-4 py-2 rounded-lg mb-3 transition font-semibold">
                        Logout
                    </button>
                </form>
            <?php endif; ?>
            © <?= date('Y') ?> Lunara
        </div>
    </aside>

    <!-- 🌌 Main Content -->
    <main class="flex-1 p-8 overflow-y-auto relative z-10">

        <!-- Floating Moon -->
        <div class="moon"></div>

        <!-- Header -->
        <div class="mb-10">
            <h2 class="text-4xl font-extrabold text-gradient drop-shadow-lg">Dashboard Overview</h2>
            <p class="text-gray-300 mt-2">Manage your flowers, orders, and customers under the moonlight 🌙</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <div class="panel">
                <h3 class="text-[#8ecae6] font-semibold mb-2">Total Products</h3>
                <p class="text-4xl font-bold">128</p>
            </div>
            <div class="panel">
                <h3 class="text-[#8ecae6] font-semibold mb-2">Orders Today</h3>
                <p class="text-4xl font-bold">56</p>
            </div>
            <div class="panel">
                <h3 class="text-[#8ecae6] font-semibold mb-2">Active Customers</h3>
                <p class="text-4xl font-bold">342</p>
            </div>
        </div>

        <!-- Product Management Table -->
        <section class="panel">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-[#8ecae6]">Product List</h3>
                <button class="btn-arctic">+ Add Product</button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img src="https://s.turbifycdn.com/aah/snowcreek/moon-garden-lily-bulb-collection-18-bulbs-22.png" class="w-10 h-10 rounded-lg object-cover" />
                                Lunar Lilies
                            </td>
                            <td class="py-3 px-4">₱299</td>
                            <td class="py-3 px-4">24</td>
                            <td class="py-3 px-4 status-active">Active</td>
                            <td class="py-3 px-4 text-right"><button class="text-[#8ecae6] hover:text-[#a8dadc]">Edit</button></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img src="https://i.etsystatic.com/34146895/r/il/6b42c8/6329788818/il_fullxfull.6329788818_4af6.jpg" class="w-10 h-10 rounded-lg object-cover" />
                                Midnight Roses
                            </td>
                            <td class="py-3 px-4">₱349</td>
                            <td class="py-3 px-4">12</td>
                            <td class="py-3 px-4 status-active">Active</td>
                            <td class="py-3 px-4 text-right"><button class="text-[#8ecae6] hover:text-[#a8dadc]">Edit</button></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img src="https://www.oderings.co.nz/assets/Argranthemum-Sassy-Red-web_T_144491_5.jpg" class="w-10 h-10 rounded-lg object-cover" />
                                Starlit Daisies
                            </td>
                            <td class="py-3 px-4">₱259</td>
                            <td class="py-3 px-4">18</td>
                            <td class="py-3 px-4 status-active">Active</td>
                            <td class="py-3 px-4 text-right"><button class="text-[#8ecae6] hover:text-[#a8dadc]">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>

</html>