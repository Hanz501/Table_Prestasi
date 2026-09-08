<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'update_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'delete_at DATETIME DEFAULT NULL'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('portfolios');
    }

    public function down()
    {
        $this->forge->dropTable('portfolios');
    }
}
