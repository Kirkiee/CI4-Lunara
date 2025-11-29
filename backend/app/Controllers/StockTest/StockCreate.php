<?php

namespace App\Controllers\StockTest;

use App\Controllers\BaseController;
use App\Models\StockModel;

class StockCreate extends BaseController
{
    public function index()
    {
        $stockModel = new StockModel();

        // Fetch all stocks as objects
        $stocks = array_map(function ($item) {
            return (object)$item;
        }, $stockModel->findAll());

        $data = [
            'stocks' => $stocks
        ];

        return view('admin/stock', $data);
    }

    public function create()
    {
        $session = session();
        $request = service('request');
        $stockModel = new StockModel();

        $post = $request->getPost();

        // Validation
        if (!$post['flower'] || !$post['category']  || !$post['price'] || !$post['stock'] || !$post['status']) {
            $session->setFlashdata('errors', ['general' => 'All fields are required']);
            return redirect()->back()->withInput();
        }

        $inserted = $stockModel->insert([
            'flower'   => $post['flower'],
            'category' => $post['category'],
            'price'    => $post['price'],
            'stock'    => $post['stock'],
            'status'   => $post['status']
        ]);

        if ($inserted === false) {
            $session->setFlashdata('errors', ['general' => 'Could not add stock']);
        } else {
            $session->setFlashdata('success', 'Stock added successfully!');
        }

        return redirect()->to('/admin/stock');
    }
}
