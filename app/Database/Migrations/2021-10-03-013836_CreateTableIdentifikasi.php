<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableIdentifikasi extends Migration
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
            'sasaran_organisasi'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kejadian' => [
                'type' => 'TEXT',
            ],
            'kategori_resiko' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'penyebab' => [
                'type' => 'TEXT',
            ],
            'dampak'       => [
                'type'       => 'TEXT',
            ],
            'uraian_spi' => [
                'type' => 'TEXT',
            ],
            'efektivitas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'level_kemungkinan' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'level_dampak' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'level_resiko' => [
                'type'       => 'INT',
                'constraint' => 10
            ],
            'tingkat_level_resiko' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'prioritas_resiko' => [
                'type'       => 'INT',
                'constraint' => 10
            ],
            'no_reg_resiko' => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ], 'keputusan_mitigasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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
        $this->forge->createTable('identifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('identifikasi');
    }
}
