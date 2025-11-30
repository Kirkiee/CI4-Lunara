<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StockModel;

class Cart extends Controller
{
    protected $session;
    protected $stockModel;

    public function __construct()
    {
        $this->session = session();
        $this->stockModel = new StockModel();
    }

    // Add product to cart
    public function add()
    {
        $session = session();
        $user = $session->get('user');

        // Check if user is logged in
        if (!$user) {
            return $this->response->setJSON([
                'error' => 'You must be logged in to add items to the cart.'
            ])->setStatusCode(401); // 401 Unauthorized
        }

        $id = $this->request->getPost('id');
        $product = $this->stockModel->find($id);

        if (!$product) {
            return $this->response->setJSON(['error' => 'Product not found'])->setStatusCode(404);
        }

        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id'    => $product['id'],
                'title' => $product['flower'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty'   => 1
            ];
        }

        $session->set('cart', $cart);

        return $this->response->setJSON(['success' => true]);
    }

    // Increase quantity
    public function increase($id)
    {
        $cart = $this->session->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            $this->session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    // Decrease quantity
    public function decrease($id)
    {
        $cart = $this->session->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;

            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }

            $this->session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    // Remove item
    public function remove($id)
    {
        $cart = $this->session->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->session->set('cart', $cart);
        }

        return redirect()->to('/cart');
    }

    // Show cart page
    public function index()
    {
        $cart = $this->session->get('cart') ?? [];

        return view('user/cart', [
            'cart' => $cart
        ]);
    }
}
