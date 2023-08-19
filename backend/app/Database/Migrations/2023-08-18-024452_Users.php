<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
