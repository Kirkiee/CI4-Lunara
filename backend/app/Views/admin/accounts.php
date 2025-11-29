<?php
$session = session();
$current = uri_string();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunara Admin — Accounts</title>

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

        .status-active {
            color: #a8dadc;
            font-weight: 600;
        }

        .status-inactive {
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

    <!-- SIDEBAR -->
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

    <!-- MAIN CONTENT -->
    <main class="relative flex-1 p-8 overflow-y-auto">
        <div class="moon"></div>

        <h2 class="drop-shadow-lg font-extrabold text-gradient text-4xl">Accounts Management</h2>
        <p class="mt-2 text-gray-300">Manage user access and roles under the moonlight 🌙</p>

        <!-- Stats -->
        <div class="gap-8 grid md:grid-cols-3 mt-10 mb-12">
            <div class="panel">
                <h3 class="font-semibold text-[#8ecae6]">Total Accounts</h3>
                <p class="font-bold text-4xl"><?= $total_accounts ?></p>
            </div>

            <div class="panel">
                <h3 class="font-semibold text-[#8ecae6]">Active Users</h3>
                <p class="font-bold text-4xl"><?= $active_users ?></p>
            </div>

            <div class="panel">
                <h3 class="font-semibold text-[#8ecae6]">Admins</h3>
                <p class="font-bold text-4xl"><?= $admin_count ?></p>
            </div>
        </div>

        <!-- Accounts Table -->
        <section class="panel">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-[#8ecae6] text-2xl">User Accounts</h3>

                <button class="btn-arctic" onclick="document.getElementById('addAccountModal').showModal();">
                    + Add Account
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $u): ?>
                            <?php
                            $fullName = $u->first_name . ' ' . ($u->middle_name ? $u->middle_name . ' ' : '') . $u->last_name;
                            $statusClass = $u->account_status ? 'status-active' : 'status-inactive';
                            $statusLabel = $u->account_status ? 'Active' : 'Inactive';
                            ?>
                            <tr>
                                <td><?= esc($u->id) ?></td>
                                <td><?= esc($fullName) ?></td>
                                <td><?= esc($u->email) ?></td>
                                <td class="font-medium text-[#8ecae6]"><?= ucfirst($u->type) ?></td>
                                <td class="<?= $statusClass ?>"><?= $statusLabel ?></td>
                                <td><?= esc($u->created_at) ?></td>
                                <td class="flex justify-end gap-2 text-right">
                                    <!-- Edit Button -->
                                    <button
                                        class="text-[#8ecae6] hover:text-[#a8dadc]"
                                        onclick="openEditModal(
        '<?= $u->id ?>',
        '<?= esc($u->first_name) ?>',
        '<?= esc($u->middle_name) ?>',
        '<?= esc($u->last_name) ?>',
        '<?= esc($u->email) ?>',
        '<?= esc($u->type) ?>',
        '<?= esc($u->account_status) ?>'
    )">
                                        Edit
                                    </button>


                                    <!-- Delete Button -->
                                    <form action="/admin/accounts/delete/<?= $u->id ?>" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this account?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="text-red-400 hover:text-red-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Add Account Modal -->
    <dialog id="addAccountModal" class="bg-gray-900/90 backdrop:bg-black/60 p-6 rounded-xl w-96">
        <?= csrf_field() ?>

        <h3 class="mb-4 font-bold text-[#8ecae6] text-2xl">Add New Account</h3>

        <form method="post" action="/admin/accounts/create" class="space-y-4">

            <input type="text" name="first_name" class="input-field" placeholder="First Name" required>
            <input type="text" name="middle_name" class="input-field" placeholder="Middle Name">
            <input type="text" name="last_name" class="input-field" placeholder="Last Name" required>

            <input type="email" name="email" class="input-field" placeholder="Email" required>

            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <input type="password" name="password_confirm" class="input-field" placeholder="Confirm Password" required>

            <select name="type" class="input-field" required>
                <option value="client">Client</option>
                <option value="admin">Admin</option>
            </select>

            <input type="hidden" name="account_status" value="1">

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="document.getElementById('addAccountModal').close();" class="bg-gray-600 btn-arctic">
                    Cancel
                </button>
                <button type="submit" class="btn-arctic">
                    Create
                </button>
            </div>
        </form>
    </dialog>

    <!-- ➤ ADDED (NEW): EDIT ACCOUNT MODAL -->
    <dialog id="editAccountModal" class="bg-gray-900/90 backdrop:bg-black/60 p-6 rounded-xl w-96">
        <h3 class="mb-4 font-bold text-[#8ecae6] text-2xl">Edit Account</h3>

        <form id="editForm" method="post" class="space-y-4">
            <?= csrf_field() ?>

            <input type="text" name="first_name" id="edit_first_name" class="input-field" required>
            <input type="text" name="middle_name" id="edit_middle_name" class="input-field">
            <input type="text" name="last_name" id="edit_last_name" class="input-field" required>

            <input type="email" name="email" id="edit_email" class="input-field" required>

            <select name="type" id="edit_type" class="input-field" required>
                <option value="client">Client</option>
                <option value="admin">Admin</option>
            </select>

            <select name="account_status" id="edit_status" class="input-field" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="document.getElementById('editAccountModal').close();" class="bg-gray-600 btn-arctic">
                    Cancel
                </button>
                <button type="submit" class="btn-arctic">
                    Update
                </button>
            </div>
        </form>
    </dialog>

    <!-- ➤ ADDED (NEW JAVASCRIPT) -->
    <script>
        function openEditModal(id, first, middle, last, email, type, status) {
            document.getElementById('edit_first_name').value = first;
            document.getElementById('edit_middle_name').value = middle;
            document.getElementById('edit_last_name').value = last;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_type').value = type;
            document.getElementById('edit_status').value = status;

            // Important: set form action to include user ID
            document.getElementById('editForm').action = "/admin/accounts/update/" + id;

            document.getElementById('editAccountModal').showModal();
        }
    </script>

</body>

</html>