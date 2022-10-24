<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMitigasi extends Migration
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
            'mitigasi_kejadian'       => [
                'type'       => 'TEXT',
            ],
            'mitigasi_prioritas_resiko'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'mitigasi_no_reg_resiko'  => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ],
            'opsi_mitigasi'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'keg_pengendalian_tambahan'  => [
                'type'       => 'TEXT'
            ],
            'target'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'jadwal_implementasi'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'penanggung_jawab'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'mitigasi_level_kemungkinan' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'mitigasi_level_dampak' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'mitigasi_level_resiko' => [
                'type'       => 'INT',
                'constraint' => 10
            ],
            'mitigasi_tingkat_level_resiko' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'mitigasi_dilaksanakan'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'capaian_target'  => [
                'type'       => 'TEXT'
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'pmr_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'identifikasi_id' => [
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
        $this->forge->createTable('mitigasi');
    }

    public function down()
    {
        $this->forge->dropTable('mitigasi');
    }
}
