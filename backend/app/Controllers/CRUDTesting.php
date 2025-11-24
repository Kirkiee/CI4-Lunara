<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class CRUDTesting extends BaseController
{
    public function showUsersPage()
    {
        $userModel = new UserModel();

        // ⭐ Fetch all users
        $ListOfUser = $userModel->findAll();

        // If no users
        if (empty($ListOfUser)) {
            $ListOfUser = "No users found.";
        }

        $data = [
            'ListOfUser' => $ListOfUser,
            'pageItems' => is_array($ListOfUser) ? $ListOfUser : [] // for table loop
        ];

        return view('Design', $data);
    }
}
