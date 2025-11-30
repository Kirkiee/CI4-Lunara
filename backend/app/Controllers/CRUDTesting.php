<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class CRUDTesting extends BaseController
{
    /**
     * Show users page
     */
    public function showUsersPage()
    {
        $userModel = new UsersModel();

        // Fetch all users
        $ListOfUser = $userModel->findAll();

        if (empty($ListOfUser)) {
            $ListOfUser = "No users found.";
        }

        $data = [
            'ListOfUser' => $ListOfUser,
            'pageItems'  => is_array($ListOfUser) ? $ListOfUser : [] // for table loop
        ];

        return view('Design', $data);
    }

    /**
     * Delete user (soft delete)
     */
    public function CRUDTesting()
    {
        $request = service('request');
        $post    = $request->getPost();
        $session = session();
        $userModel = new UsersModel();
        $validation = \Config\Services::validation();

        // Validation
        $validation->setRule('id', 'ID', 'required|min_length[1]');

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        try {
            // Check if account exists
            $account = $userModel->where('id', $post['id'])->first();

            if (! $account) {
                return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                    ->setJSON(['success' => false, 'message' => 'Account not found']);
            }

            // Soft delete payload
            $payload = [
                'id' => $post['id'],
                'account_status' => 0,
                'deleted_at'     => date('Y-m-d H:i:s'),
            ];

            // Update database
            $ok = $userModel->save($payload);

            if ($ok === false) {
                throw new \Exception('Model deletion failed');
            }

            // Success
            return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON([
                    'success' => true,
                    'message' => 'Account Deleted',
                    'data'    => ['id' => $post['id']]
                ]);
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)
                ->setJSON([
                    'success' => false,
                    'message' => 'Server error while deleting account: ' . $e->getMessage()
                ]);
        }
    }
}
