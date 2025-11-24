<?php

namespace App\Controllers\test;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserCreate extends BaseController
{
    public function CRUDTesting()
    {
        $request     = service('request');
        $session     = session();
        $validation  = \Config\Services::validation();
        $userModel   = new UsersModel();

        // ----------------------------------------------------------
        // VALIDATION RULES
        // ----------------------------------------------------------
        $validation->setRules([
            'first_name'        => 'required|min_length[2]|max_length[100]',
            'middle_name'       => 'permit_empty|max_length[100]',
            'last_name'         => 'required|min_length[2]|max_length[100]',
            'email'             => 'required|valid_email',
            'password'          => 'required|min_length[6]',
            'password_confirm'  => 'required|matches[password]',
            'type'              => 'required|in_list[admin,client]',
            'account_status'    => 'required|in_list[0,1]',
        ]);

        $post = $request->getPost();

        // ----------------------------------------------------------
        // VALIDATION FAILED
        // ----------------------------------------------------------
        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ----------------------------------------------------------
        // EMAIL DUPLICATE CHECK
        // ----------------------------------------------------------
        $existing = $userModel->where('email', $post['email'])->first();

        if ($existing) {
            $session->setFlashdata('errors', ['email' => 'Email is already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ----------------------------------------------------------
        // DATA INSERT
        // ----------------------------------------------------------
        $data = [
            'first_name'      => $post['first_name'],
            'middle_name'     => $post['middle_name'],
            'last_name'       => $post['last_name'],
            'email'           => $post['email'],
            'password_hash'   => password_hash($post['password'], PASSWORD_DEFAULT),
            'type'            => $post['type'],           // admin  / client
            'account_status'  => $post['account_status'], // 1 = active, 0 = inactive
            'email_activated' => 1,                       // auto-activated
        ];

        $inserted = $userModel->insert($data);

        if ($inserted === false) {
            $session->setFlashdata('errors', ['general' => 'Could not create account']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ----------------------------------------------------------
        // SUCCESS
        // ----------------------------------------------------------
        $session->setFlashdata('success', 'Account successfully created!');
        return redirect()->to('/admin/accounts');
    }
}