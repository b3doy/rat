<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSaron extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'daftar_sasaran'       => [
                'type'       => 'TEXT',
                'constraint' => '255',
            ],
            'indikator' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'pmr_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('saron');
    }

    public function down()
    {
        $this->forge->dropTable('saron');
    }
}
