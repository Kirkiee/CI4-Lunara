<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Fetch users (id, email, first_name, last_name)
        $users = $db->table('users')
            ->select('id, email, first_name, last_name')
            ->get()
            ->getResultArray();

        if (empty($users)) {
            echo "No users found! Please seed users first.\n";
            return;
        }

        // Fetch stock items (id, flower, price)
        $stocks = $db->table('stock')
            ->select('id, flower, price')
            ->get()
            ->getResultArray();

        if (empty($stocks)) {
            echo "No stock items found! Please seed stock first.\n";
            return;
        }

        $orders = [];

        // Generate 20 sample orders
        for ($i = 0; $i < 20; $i++) {
            // Pick a random user
            $user = $users[array_rand($users)];

            // Pick 1-3 random stock items
            $numItems = rand(1, 3);
            $selectedIndexes = array_rand($stocks, $numItems);

            if (!is_array($selectedIndexes)) {
                $selectedIndexes = [$selectedIndexes];
            }

            $itemsArray = [];
            $totalPrice = 0;
            $totalQuantity = 0;

            foreach ($selectedIndexes as $index) {
                $item = $stocks[$index];
                $quantity = rand(1, 5);

                $itemsArray[] = [
                    'flower' => $item['flower'],
                    'quantity' => $quantity,
                    'price' => $item['price']
                ];

                $totalPrice += $item['price'] * $quantity;
                $totalQuantity += $quantity;
            }

            $statusOptions = ['Pending', 'Completed', 'Cancelled'];
            $status = $statusOptions[array_rand($statusOptions)];

            $orders[] = [
                'customer_email' => $user['email'],
                'customer_name'  => $user['first_name'] . ' ' . $user['last_name'],
                'items'          => json_encode($itemsArray),
                'price'          => $totalPrice,
                'stock'          => $totalQuantity,
                'status'         => $status,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ];
        }

        // Insert into orders table
        $db->table('orders')->insertBatch($orders);
    }
}
