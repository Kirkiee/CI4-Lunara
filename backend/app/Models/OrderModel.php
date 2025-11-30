<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $returnType = 'object'; // Ensures $order->items works
    protected $useTimestamps = true;  // Uses created_at and updated_at
    protected $useSoftDeletes = true; // Uses deleted_at

    protected $allowedFields = [
        'customer_email',   // from Users table
        'customer_name',    // first + last name
        'items',            // JSON of stock items
        'price',            // total price
        'stock',            // total quantity
        'status',           // Pending, Completed, Cancelled
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Automatically decode JSON items when fetching records
     */
    protected function afterFind(array $data)
    {
        if (!empty($data['data'])) {
            foreach ($data['data'] as &$row) {
                if (isset($row->items) && is_string($row->items)) {
                    $row->items = json_decode($row->items, true);
                }
            }
        }
        return $data;
    }
}
