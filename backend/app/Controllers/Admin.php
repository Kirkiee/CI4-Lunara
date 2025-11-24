<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Admin extends BaseController
{
    public function __construct()
    {
        if (!session()->has('user')) {
            redirect()->to('/login')->send();
            exit;
        }

        $user = session('user');

        // Handle both Array or Object
        $type = is_array($user) ? $user['type'] : $user->type;

        if ($type !== 'admin') {
            redirect()->to('/login')->send();
            exit;
        }
    }



    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function stock()
    {
        return view('admin/stock');
    }

    public function orders()
    {
        return view('admin/orders');
    }

    // -------------------------------------------------------
    // FIXED ACCOUNTS CONTROLLER
    // -------------------------------------------------------
    public function accounts()
    {
        $userModel = new UsersModel();

        // Collect statistics
        $totalAccounts = $userModel->countAllResults();

        // active users
        $activeUsers = $userModel->where('account_status', 1)->countAllResults();

        // admin count
        $adminCount = $userModel->where('type', 'admin')->countAllResults();

        // Reset model builder (important)
        $userModel->resetQuery();

        // Fetch entire user list
        $users = $userModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'total_accounts' => $totalAccounts,
            'active_users'   => $activeUsers,
            'admin_count'    => $adminCount,
            'users'          => $users,
        ];

        return view('admin/accounts', $data);
    }

    public function request()
    {
        return view('admin/request');
    }
}