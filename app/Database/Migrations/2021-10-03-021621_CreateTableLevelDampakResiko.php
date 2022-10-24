<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableLevelDampakResiko extends Migration
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
            'dampak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '99',
            ],
            'jumlah_kerugian_negara'  => [
                'type'       => 'TEXT'
            ],
            'penurunan_reputasi'  => [
                'type'       => 'TEXT'
            ],
            'penurunan_kinerja'  => [
                'type'       => 'TEXT'
            ],
            'gangguan_terhadap_pelayanan'  => [
                'type'       => 'TEXT'
            ],
            'jumlah_tuntutan_hukum'  => [
                'type'       => 'TEXT'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('level_dampak_resiko');
    }

    public function down()
    {
        $this->forge->dropTable('level_dampak_resiko');
    }
}
