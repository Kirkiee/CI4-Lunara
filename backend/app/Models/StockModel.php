<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stock';  // make sure this matches your database table
    protected $primaryKey = 'id';
    protected $allowedFields = ['flower', 'category', 'price', 'stock', 'status'];
}