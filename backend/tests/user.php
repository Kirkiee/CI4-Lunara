<table class="min-w-full text-sm text-left">
    <thead>
        <tr>
            <th class="p-3">id</th>
            <th class="p-3">first_name</th>
            <th class="p-3">middle_name</th>
            <th class="p-3">last_name</th>
            <th class="p-3">email</th>
            <th class="p-3">password_hash</th>
            <th class="p-3">gender</th>
            <th class="p-3">phone_number</th>
            <th class="p-3">address_line</th>
            <th class="p-3">city</th>
            <th class="p-3">province</th>
            <th class="p-3">postal_code</th>
            <th class="p-3">type</th>
            <th class="p-3">account_status</th>
            <th class="p-3">email_activated</th>
            <th class="p-3">profile_image</th>
            <th class="p-3">deleted_at</th>
            <th class="p-3">created_at</th>
            <th class="p-3">updated_at</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $service): ?>
            <tr class="border-b">

                <td class="p-3"><?= $service->id ?></td>
                <td class="p-3"><?= $service->first_name ?></td>
                <td class="p-3"><?= $service->middle_name ?></td>
                <td class="p-3"><?= $service->last_name ?></td>
                <td class="p-3"><?= $service->email ?></td>
                <td class="p-3"><?= $service->password_hash ?></td>
                <td class="p-3"><?= $service->gender ?></td>
                <td class="p-3"><?= $service->phone_number ?></td>
                <td class="p-3"><?= $service->address_line ?></td>
                <td class="p-3"><?= $service->city ?></td>
                <td class="p-3"><?= $service->province ?></td>
                <td class="p-3"><?= $service->postal_code ?></td>
                <td class="p-3"><?= $service->type ?></td>
                <td class="p-3"><?= $service->account_status ?></td>
                <td class="p-3"><?= $service->email_activated ?></td>
                <td class="p-3"><?= $service->profile_image ?></td>
                <td class="p-3"><?= $service->deleted_at ?></td>
                <td class="p-3"><?= $service->created_at ?></td>
                <td class="p-3"><?= $service->updated_at ?></td>

                <td class="flex gap-2 p-3">
                    <div class="flex justify-end mb-4">
                        <!-- This access to the edit page -->
                        <a class="bg-gray-600/70 hover:bg-gray-600/60 px-3 py-2 rounded text-white duration-200 cursor-pointer"
                            href="<?php echo site_url('test/update/' . urlencode($service->id)); ?>">
                            edit
                        </a>

                        <!-- This access to the delete function -->
                        <a class="bg-gray-600/70 hover:bg-gray-600/60 px-3 py-2 rounded text-white duration-200 cursor-pointer"
                            href="<?php echo site_url('test/delete/' . urlencode($service->id)); ?>">
                            edit
                        </a>
                    </div>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>