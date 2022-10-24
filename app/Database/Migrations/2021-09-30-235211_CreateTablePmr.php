<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePmr extends Migration
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
            'tahun'       => [
                'type'       => 'INT',
                'constraint' => '10',
            ],
            'kld' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_unit' => [
                'type'  => 'VARCHAR',
                'constraint' => '155'
            ],
            'level_mr_eselon' => [
                'type'  => 'VARCHAR',
                'constraint' => '99'
            ],
            'nama_level_unit' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ruang_lingkup_penerapan' => [
                'type'  => 'TEXT',
                'null' => true
            ],
            'periode' => [
                'type'  => 'INT',
                'constraint' => 10
            ],
            'output' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'data_sudah_benar' => [
                'type'  => 'VARCHAR',
                'constraint' => '55'
            ],
            'user_id' => [
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
        $this->forge->createTable('pmr');
    }

    public function down()
    {
        $this->forge->dropTable('pmr');
    }
}
