<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEvaluasi extends Migration
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
            'prioritas_resiko'       => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'no_reg_resiko'       => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ],
            'kejadian'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'level_kemungkinan_sebelumnya'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'level_dampak_sebelumnya'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'level_resiko_sebelumnya'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'tingkat_level_resiko_sebelumnya'  => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ],
            'level_kemungkinan_harapan'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'level_dampak_harapan'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'level_resiko_harapan'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'tingkat_level_resiko_harapan'  => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ],
            'level_kemungkinan_actual'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'level_dampak_actual'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'level_resiko_actual'  => [
                'type'       => 'INT',
                'constraint' => 5
            ],
            'tingkat_level_resiko_actual'  => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ],
            'trend_resiko'  => [
                'type'       => 'VARCHAR',
                'constraint' => '55'
            ],
            'deviasi_resiko' => [
                'type'       => 'VARCHAR',
                'constraint' => '55',
            ],
            'rekomendasi' => [
                'type'       => 'TEXT',
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
            'mitigasi_id' => [
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
        $this->forge->createTable('evaluasi');
    }

    public function down()
    {
        $this->forge->dropTable('evaluasi');
    }
}
