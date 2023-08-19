<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'kategori' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategories');
    }

    public function down()
    {
        $this->forge->dropTable('kategories');
    }
}
