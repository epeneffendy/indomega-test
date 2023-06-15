<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rents extends Migration
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
            'ship_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'rent_start' => [
                'type'       => 'DATE',
            ],
            'duration_in_day' => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
            'pricing_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'renter' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('rents');
    }

    public function down()
    {
        $this->forge->dropTable('rents');
    }
}