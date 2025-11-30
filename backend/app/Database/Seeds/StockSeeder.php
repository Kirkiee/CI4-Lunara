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
                'image' => 'https://s.turbifycdn.com/aah/snowcreek/moon-garden-lily-bulb-collection-18-bulbs-22.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Midnight Roses',
                'category' => 'Roses',
                'price' => '349',
                'stock' => '6',
                'status' => 'Low Stock',
                'image' => 'https://i.etsystatic.com/34146895/r/il/6b42c8/6329788818/il_fullxfull.6329788818_4af6.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Starlit Daisies',
                'category' => 'Daisies',
                'price' => '259',
                'stock' => '0',
                'status' => 'Out of Stock',
                'image' => 'https://www.oderings.co.nz/assets/Argranthemum-Sassy-Red-web_T_144491_5.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Frostpetal Orchids',
                'category' => 'Orchids',
                'price' => '329',
                'stock' => '31',
                'status' => 'Available',
                'image' => 'https://blacksheepperennials.com/cdn/shop/files/Lamium_OrchidFrost.png?v=1751392662',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Aurora Peonies',
                'category' => 'Peonies',
                'price' => '379',
                'stock' => '31',
                'status' => 'Available',
                'image' => 'https://wholesalefloristdirect.co.uk/wp-content/uploads/2025/06/aurora-peony-ivory.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Glacier Hydrangeas',
                'category' => '	Hydrangeaceae',
                'price' => '289',
                'stock' => '6',
                'status' => 'Low Stock',
                'image' => 'https://lgrmag.com/wp-content/uploads/2023/01/Monrovia-Hydrangea-macrophylla-Seaside-Serenade-Glacier-1024x1024.jpeg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Moonshadow Tulips',
                'category' => 'Tulips',
                'price' => '319',
                'stock' => '33',
                'status' => 'Available',
                'image' => 'https://novelnovicetwilight.wordpress.com/wp-content/uploads/2009/04/100_2455.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Crystal Petunias',
                'category' => 'Petunias',
                'price' => '249',
                'stock' => '35',
                'status' => 'Available',
                'image' => 'https://glenleagreenhouses.com/cdn/shop/products/Petunia_Headliner_Crystal_Sky.jpg?v=1644943013',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'flower' => 'Polar Blossoms',
                'category' => 'Bloom',
                'price' => '359',
                'stock' => '37',
                'status' => 'Available',
                'image' => 'https://glenleagreenhouses.com/cdn/shop/products/Petunia_Headliner_Crystal_Sky.jpg?v=1644943013',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $this->db->table('stock')->insertBatch($stock);
    }
}
