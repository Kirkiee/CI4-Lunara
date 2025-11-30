<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Orders extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    /**
     * Display all orders
     */
    public function index()
    {
        $orders = $this->orderModel->orderBy('created_at', 'DESC')->findAll();

        // Decode items JSON for each order
        foreach ($orders as &$order) {
            if (is_string($order->items)) {
                $order->items = json_decode($order->items, true);
            }
        }

        return view('admin/orders', [
            'orders' => $orders
        ]);
    }

    /**
     * View a single order by ID
     */
    public function view($id = null)
    {
        $order = $this->orderModel->find($id);

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Order #{$id} not found");
        }

        if (is_string($order->items)) {
            $order->items = json_decode($order->items, true);
        }

        return view('admin/order_view', [
            'order' => $order
        ]);
    }
}
