<?php

namespace App\Controllers\test;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserDelete extends BaseController
{
    public function delete($id)
    {
        $userModel = new UsersModel();

        if ($userModel->find($id)) {
            $userModel->delete($id);
            return redirect()->back()->with('success', 'Account deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
