<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunara — Login</title>
    <link rel="shortcut icon" type="image/png" href="/assets/lunaraMoonIcon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: radial-gradient(circle at top, #0d1b2a 0%, #122639 50%, #1b3b52 100%);
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
        }

        .text-gradient {
            background: linear-gradient(90deg, #7cd3ff, #b5e9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ❄ Soft floating ice orb (Seel-inspired) */
        .moon {
            position: absolute;
            top: 8%;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            background: radial-gradient(circle at 40% 40%, #cce6ff, #99cfe0 60%, #6699b2 100%);
            border-radius: 50%;
            box-shadow: 0 0 50px 15px rgba(150, 200, 240, 0.25);
            filter: blur(1px);
            animation: floatIce 10s ease-in-out infinite alternate;
            z-index: 0;
        }

        @keyframes floatIce {
            0% {
                transform: translate(-50%, 0);
            }

            100% {
                transform: translate(-50%, -20px);
            }
        }

        .error-text {
            color: #f87171;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        input::placeholder {
            color: #cbd5e1;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen text-gray-100 relative">

    <!-- Floating ice orb -->
    <div class="moon"></div>

    <!-- Login form -->
    <div class="relative z-10 bg-white/10 backdrop-blur-md p-10 rounded-2xl shadow-2xl border border-white/20 w-full max-w-md">
        <h2 class="text-center text-3xl font-bold mb-6 text-gradient">Welcome Back ❄️</h2>

        <!-- Display general login error -->
        <?php if (!empty($login_error)): ?>
            <p class="error-text text-center mb-4"><?= esc($login_error) ?></p>
        <?php endif; ?>

        <form action="/login" method="POST" class="space-y-5" novalidate>
            <?= csrf_field() ?>

            <div>
                <label class="block text-sm font-semibold text-blue-200 mb-2">Email Address</label>
                <input type="email" name="email" required
                    value="<?= esc($old['email'] ?? '') ?>"
                    class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400
                    <?= isset($errors['email']) ? 'border border-red-500' : 'border border-white/30' ?>"
                    placeholder="you@lunara.com">
                <?php if (!empty($errors['email'])): ?>
                    <p class="error-text"><?= esc($errors['email']) ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-200 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400
                    <?= isset($errors['password']) ? 'border border-red-500' : 'border border-white/30' ?>"
                    placeholder="••••••••">
                <?php if (!empty($errors['password'])): ?>
                    <p class="error-text"><?= esc($errors['password']) ?></p>
                <?php endif; ?>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-400 to-cyan-400 text-gray-100 font-semibold py-3 rounded-full
                hover:from-blue-500 hover:to-cyan-500 hover:shadow-lg hover:shadow-cyan-300/30 transition-all duration-200">
                Login
            </button>
        </form>

        <p class="text-center text-gray-300 mt-6 text-sm">
            Don’t have an account?
            <a href="/signup" class="text-blue-300 hover:text-blue-400 font-semibold">Sign Up</a>
        </p>

        <p class="text-center mt-6">
            <a href="index.php" class="text-sm text-gray-400 hover:text-blue-300">← Back to Home</a>
        </p>
    </div>

</body>

</html>