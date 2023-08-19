<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
            'judul' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'slug' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'konten' => [
                'type'           => 'TEXT'
            ],
            'penulis' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'tgl_publish' => [
                'type'           => 'TIMESTAMP'
            ],
            'kategori' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
