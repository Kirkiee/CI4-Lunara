<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;

class Shop extends BaseController
{
    public function index()
    {
        // The main view loads without products; products will be fetched via POST
        return view('user/shop');
    }

    // POST endpoint to fetch products
    public function fetchProducts()
    {
        $stockModel = new StockModel();

        // Only fetch products with status Available or Low Stock
        $products = $stockModel->whereIn('status', ['Available', 'Low Stock'])->findAll();

        // Return JSON to the JS in the view
        return $this->response->setJSON($products);
    }
}
