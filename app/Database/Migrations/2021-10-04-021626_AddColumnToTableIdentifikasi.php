<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnToTableIdentifikasi extends Migration
{
    public function up()
    {
        $fields = [
            'no_identifikasi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'after'      => 'id'
            ],
        ];
        $this->forge->addColumn('identifikasi', $fields);
    }

    public function down()
    {
    }
}
