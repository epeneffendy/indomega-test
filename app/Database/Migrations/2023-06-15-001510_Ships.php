<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ships extends Migration
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
            'ship_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'flag' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ships');
    }

    public function down()
    {
        $this->forge->dropTable('ships');
    }
}