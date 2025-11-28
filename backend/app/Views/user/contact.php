<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lunara — Contact Us</title>
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

            background: radial-gradient(circle at 40% 40%,
                    #8fa6b8,
                    #6c8295 55%,
                    #4a5a67 100%);

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

        .stars::before,
        .stars::after {
            content: "";
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ffffffd0;
            border-radius: 50%;
            box-shadow:
                120px 60px #ffffffaa, 280px 100px #ffffffaa,
                480px 140px #ffffffcc, 720px 90px #ffffffaa,
                950px 130px #ffffffcc, 200px 190px #ffffffaa,
                610px 230px #ffffffaa, 820px 210px #ffffffaa,
                430px 270px #ffffffcc;
            animation: snowfall 4s infinite ease-in-out alternate;
            opacity: 0.85;
        }

        @keyframes snowfall {

            0%,
            100% {
                opacity: 0.9;
                transform: translateY(0);
            }

            50% {
                opacity: 0.4;
                transform: translateY(10px);
            }
        }

        .text-gradient {
            background: linear-gradient(90deg, #a8e0ff, #d2f3ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="text-gray-100 relative">

    <!-- Header -->
    <div class="text-center">
        <?= view('components/header') ?>
    </div>

    <!-- Hero Section -->
    <section class="relative text-center py-32 px-6 bg-gradient-to-b from-transparent to-[#c7e6f5]/40 overflow-hidden">
        <div class="moon-container">
            <div class="stars"></div>
            <div class="moon"></div>
        </div>

        <div class="relative z-10">
            <h2 class="text-5xl md:text-6xl font-extrabold text-gradient mb-4 drop-shadow-lg">
                Contact Lunara
            </h2>
            <p class="max-w-2xl mx-auto text-lg text-gradient">
                We'd love to hear from you—questions, orders, custom bouquets, or collaboration inquiries.
            </p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="bg-white/10 backdrop-blur-xl py-20 text-gray-900">
        <div class="mx-auto px-4 max-w-4xl">

            <h3 class="mb-12 font-bold text-4xl text-center header-title">Get in Touch</h3>

            <div class="bg-white/10 border border-white/30 rounded-2xl shadow-xl p-10 backdrop-blur-lg">

                <form action="/send-message" method="POST" class="space-y-6">

                    <div>
                        <label class="text-lg font-semibold text-indigo-100">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 border border-white/30 text-gray-100 focus:ring focus:ring-sky-300/40">
                    </div>

                    <div>
                        <label class="text-lg font-semibold text-indigo-100">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 border border-white/30 text-gray-100 focus:ring focus:ring-sky-300/40">
                    </div>

                    <div>
                        <label class="text-lg font-semibold text-indigo-100">Message</label>
                        <textarea name="message" required rows="5"
                            class="w-full mt-2 px-4 py-3 rounded-xl bg-white/20 border border-white/30 text-gray-100 focus:ring focus:ring-sky-300/40"></textarea>
                    </div>

                    <button type="submit"
                        class="mt-6 bg-sky-300 hover:bg-sky-400 px-8 py-3 rounded-full font-semibold text-gray-900 transition w-full">
                        Send Message
                    </button>

                </form>
            </div>

            <!-- Contact Info -->
            <div class="mt-16 text-center text-indigo-100">
                <p class="mb-2">📍 Lunara Floristry — Arctic Ridge District</p>
                <p class="mb-2">📞 +63 912 345 6789</p>
                <p>✉ support@lunara.com</p>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <div class="text-center">
        <?= view('components/footer') ?>
    </div>

</body>

</html>