<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'flower' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],

            'stock' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],

            'status' => [
                'type'       => "ENUM('Available','Low Stock','Out of Stock')",
                'null'       => false,
            ],

            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('flower');
        $this->forge->createTable('stock', true);
    }

    public function down()
    {
        $this->forge->dropTable('stock', true);
    }
}
