<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKategoriResiko extends Migration
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
            'kategori_resiko'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'reg'       => [
                'type'       => 'VARCHAR',
                'constraint' => '55',
            ],
            'keterangan'       => [
                'type'       => 'TEXT'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori_resiko');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_resiko');
    }
}
