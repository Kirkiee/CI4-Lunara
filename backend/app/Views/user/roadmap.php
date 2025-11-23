<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunara — Roadmap</title>
    <link rel="shortcut icon" type="image/png" href="/assets/lunaraMoonIcon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(180deg, #0a1a2a 0%, #0f2338 40%, #274862 100%);
            overflow-x: hidden;
            color: #eef7fa;
            font-family: 'Poppins', sans-serif;
        }

        .header-title {
            letter-spacing: 0.05em;
        }

        /* ❄ Arctic Moon */
        .moon {
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
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
                transform: translate(-50%, 0);
            }

            100% {
                transform: translate(-50%, -15px);
            }
        }

        /* Grid */
        .mb-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2.5rem;
            align-items: stretch;
        }

        @media(min-width:1024px) {
            .mb-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-auto-flow: row dense;
            }
        }

        /* Frosted card */
        .panel {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 6px 22px rgba(10, 25, 60, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 300px;
            backdrop-filter: blur(12px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .panel:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(10, 25, 60, 0.7);
        }

        .panel h4 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #8ecae6;
        }

        .panel p {
            flex-grow: 1;
            line-height: 1.4;
            font-size: 0.95rem;
            color: #d0f0ff;
        }

        .status-badge {
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            color: #0a1a2a;
        }

        .text-gradient {
            background: linear-gradient(90deg, #8ecae6, #a8dadc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .fade-section {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="relative">

    <div class="moon"></div>

    <!-- Header -->
    <div class="text-center relative z-10">
        <?= view('components/header') ?>
    </div>

    <!-- Hero -->
    <section class="relative text-center py-28 px-6 fade-section">
        <h2 class="text-5xl md:text-6xl font-extrabold text-gradient mb-6 drop-shadow-lg">Lunara’s Celestial Roadmap</h2>
        <p class="max-w-2xl mx-auto text-lg text-gray-300/90">
            Follow our journey through each moonlit phase — where dreams take root and blossoms meet the stars.
        </p>
    </section>

    <!-- Roadmap grid -->
    <section class="mb-grid fade-section px-6 max-w-7xl mx-auto">
        <?= view('components/cards/roadmap_card', [
            'title' => 'User (CRUD)',
            'description' => 'CREATE - SIGNUP (USER), READ - USER LIST (ADMIN), UPDATE - BLOCK USER/CHANGE PRIVILEGE (ADMIN), UPDATE - CHANGE USER INFO (USER), DELETE - DEACTIVATE ACCOUNT (USER/ADMIN)',
            'status' => 'In Progress',
            'priority' => 'High',
            'statusClass' => 'bg-[#8ecae6]'
        ]) ?>
        <?= view('components/cards/roadmap_card', [
            'title' => 'Service (CRUD)',
            'description' => 'CREATE/UPDATE - FLOWER STOCK (ADMIN), READ - FLOWER STOCK (ADMIN/USER), DELETE - STOCK (ADMIN)',
            'status' => 'In Progress',
            'priority' => 'High',
            'statusClass' => 'bg-[#8ecae6]'
        ]) ?>
        <?= view('components/cards/roadmap_card', [
            'title' => 'Request (CRUD)',
            'description' => 'CREATE - REQUEST SERVICE (CUSTOMER/ADMIN), UPDATE - EXISTING REQUEST (CUSTOMER/ADMIN), READ - REQUEST LIST (CUSTOMER/ADMIN), DELETE - REMOVE REQUEST (CUSTOMER/ADMIN)',
            'status' => 'In Progress',
            'priority' => 'High',
            'statusClass' => 'bg-[#8ecae6]'
        ]) ?>
        <?= view('components/cards/roadmap_card', [
            'title' => 'Create catalog',
            'description' => 'Create a catalog of flowers in stock',
            'status' => 'Planned',
            'priority' => 'Medium',
            'statusClass' => 'bg-[#a8dadc]'
        ]) ?>
        <?= view('components/cards/roadmap_card', [
            'title' => 'Polish website',
            'description' => 'Apply polish to all webpages',
            'status' => 'In Progress',
            'priority' => 'High',
            'statusClass' => 'bg-[#8ecae6]'
        ]) ?>
        <?= view('components/cards/roadmap_card', [
            'title' => 'Website Bloom Update',
            'description' => 'Enhance the Lunara experience with dynamic moonlight effects.',
            'status' => 'Done',
            'priority' => 'High',
            'statusClass' => 'bg-[#a8dadc]'
        ]) ?>
        <?= view('components/cards/roadmap_card', [
            'title' => 'Implement database',
            'description' => 'Implement database for data storing',
            'status' => 'Planned',
            'priority' => 'Medium',
            'statusClass' => 'bg-[#a8dadc]'
        ]) ?>
    </section>

    <!-- Footer -->
    <div class="text-center relative z-10 mt-20">
        <?= view('components/footer') ?>
    </div>

</body>

</html>