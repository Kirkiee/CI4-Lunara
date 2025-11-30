<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\OrderModel;
use CodeIgniter\Controller;

class Orders extends Controller
{
    protected $orderModel;
    protected $stockModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->stockModel = new StockModel();
    }

    // Display checkout page
    public function checkout()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        return view('user/checkout', ['cart' => $cart]);
    }

    // Place the order
    public function placeOrder()
    {
        $session = session();
        $user = $session->get('user');
        $cart = $session->get('cart');

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        $itemsForOrder = [];
        $totalPrice = 0;
        $totalQty = 0;

        // Build order items with full details
        foreach ($cart as $item) {
            $flower = $this->stockModel->find($item['id']);
            if (!$flower) continue;

            $itemsForOrder[] = [
                'id'       => $flower['id'],
                'flower'   => $flower['flower'],
                'category' => $flower['category'],
                'price'    => $flower['price'],
                'quantity' => $item['qty']
            ];

            $totalPrice += $flower['price'] * $item['qty'];
            $totalQty   += $item['qty'];
        }

        // Build customer full name
        $name = trim(($user['first_name'] ?? '') . ' ' . ($user['middle_name'] ?? '') . ' ' . ($user['last_name'] ?? ''));

        // Insert into orders table
        $this->orderModel->insert([
            'customer_name'  => $name,
            'customer_email' => $user['email'] ?? '',
            'items'          => json_encode($itemsForOrder),
            'price'          => $totalPrice,
            'stock'          => $totalQty,
            'status'         => 'Pending'
        ]);

        // Clear cart
        $session->remove('cart');

        return redirect()->to('/')->with('success', 'Order placed successfully!');
    }

    // Admin: list all orders
    public function index()
    {
        $orders = $this->orderModel->orderBy('created_at', 'DESC')->findAll();

        foreach ($orders as &$order) {
            if (is_string($order->items)) {
                $order->items = json_decode($order->items, true);
            }
        }

        return view('admin/orders', ['orders' => $orders]);
    }

    // Admin: view single order
    public function view($id = null)
    {
        $order = $this->orderModel->find($id);
        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Order #{$id} not found");
        }

        if (is_string($order->items)) {
            $order->items = json_decode($order->items, true);
        }

        return view('admin/order_view', ['order' => $order]);
    }
}
