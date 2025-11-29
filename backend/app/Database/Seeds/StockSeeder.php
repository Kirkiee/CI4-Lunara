<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $stock = [
            [
                'flower' => 'Lunar Lilies',
                'category' => 'Lilies',
                'price' => '299',
                'stock' => '30',
                'status' => 'Available',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Midnight Roses',
                'category' => 'Roses',
                'price' => '349',
                'stock' => '6',
                'status' => 'Low Stock',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Starlit Daisies',
                'category' => 'Daisies',
                'price' => '259',
                'stock' => '0',
                'status' => 'Out of Stock',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $this->db->table('stock')->insertBatch($stock);
    }
}
