<?php
// ⭐ ERROR CATCHER
if (is_string($ListOfUser)): ?>
    <div class="alert alert-info">
        <?= esc($ListOfUser) ?>
    </div>
<?php
    return;
endif;
?>

<table class="w-full min-w-[640px] text-left">
    <thead class="bg-gray-50">
        <tr>
            <th class="p-3">ID</th>
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Status</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($pageItems)) : ?>
            <tr>
                <td class="p-3" colspan="5">No users found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($pageItems as $it): ?>
                <tr class="border-t">

                    <!-- Conversion to match USERS TABLE -->
                    <td class="p-3"><?= $it->id ?></td>
                    <td class="p-3"><?= $it->first_name . ' ' . $it->last_name ?></td>
                    <td class="p-3"><?= $it->email ?></td>
                    <td class="p-3"><?= $it->account_status ?></td>

                    <!-- ACTIONS -->
                    <td class="flex gap-2 p-3">

                        <div class="flex justify-end mb-4">
                            <a class="bg-gray-600/70 hover:bg-gray-600/60 px-3 py-2 rounded text-white duration-200 cursor-pointer"
                                href="<?= site_url('test/view/' . urlencode($it->id)); ?>">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>

                        <div class="flex justify-end mb-4">
                            <a class="bg-gray-600/70 hover:bg-gray-600/60 px-3 py-2 rounded text-white duration-200 cursor-pointer"
                                href="<?= site_url('test/update/' . urlencode($it->id)); ?>">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </div>

                        <div class="flex justify-end mb-4">
                            <a class="bg-gray-600/70 hover:bg-gray-600/60 px-3 py-2 rounded text-white duration-200 cursor-pointer"
                                href="<?= site_url('test/delete/' . urlencode($it->id)); ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>