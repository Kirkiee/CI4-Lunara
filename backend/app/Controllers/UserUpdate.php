<?php

namespace App\Controllers\test;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserUpdate extends BaseController
{
    public function update($id)
    {
        $userModel  = new UsersModel();
        $request    = service('request');
        $session    = session();
        $validation = \Config\Services::validation();

        $post = $request->getPost();

        // Validation
        $validation->setRules([
            'first_name'     => 'required|min_length[2]|max_length[100]',
            'middle_name'    => 'permit_empty|max_length[100]',
            'last_name'      => 'required|min_length[2]|max_length[100]',
            'email'          => 'required|valid_email',
            'type'           => 'required|in_list[admin,client]',
            'account_status' => 'required|in_list[0,1]',
        ]);

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        // Prepare update data
        $data = [
            'first_name'     => $post['first_name'],
            'middle_name'    => $post['middle_name'],
            'last_name'      => $post['last_name'],
            'email'          => $post['email'],
            'type'           => $post['type'],
            'account_status' => $post['account_status'],
        ];

        // Run update
        $userModel->update($id, $data);

        $session->setFlashdata('success', 'Account Updated Successfully!');
        return redirect()->to('/admin/accounts');
    }
}
