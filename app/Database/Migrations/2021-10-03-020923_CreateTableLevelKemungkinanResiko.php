<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableLevelKemungkinanResiko extends Migration
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
            'level'       => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
            'kemungkinan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '99',
            ],
            'persentase_transaksi_satu_periode'  => [
                'type'       => 'TEXT'
            ],
            'kemungkinan_jml_frekuensi_suatu_periode_5_tahun'  => [
                'type'       => 'TEXT'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('level_kemungkinan_resiko');
    }

    public function down()
    {
        $this->forge->dropTable('level_kemungkinan_resiko');
    }
}
