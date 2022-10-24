<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableStakeholder extends Migration
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
            'stakeholder'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'constraint' => '255',
                'null'       => true,
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
        $this->forge->createTable('stakeholder');
    }

    public function down()
    {
        $this->forge->dropTable('stakeholder');
    }
}
