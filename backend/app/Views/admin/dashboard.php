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

        .sidebar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
        }

        .welcome-panel {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 8px 24px rgba(10, 25, 60, 0.5);
            max-width: 600px;
            margin: 4rem auto;
        }

        .welcome-panel h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .welcome-panel p {
            font-size: 1.25rem;
            color: #d0e7f9;
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
                    <button type="submit" class="w-full bg-red-500/70 hover:bg-red-500 text-white px-4 py-2 rounded-lg mb-3 transition font-semibold">
                        Logout
                    </button>
                </form>
            <?php endif; ?>
            © <?= date('Y') ?> Lunara
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto relative z-10">
        <!-- Floating Moon -->
        <div class="moon"></div>

        <div class="welcome-panel">
            <h1>🌙 Welcome to Lunara Admin 🌙</h1>
            <p>Manage your flower stock, customer orders, and user accounts with ease under the glow of the moonlight.</p>
        </div>
    </main>

</body>

</html>