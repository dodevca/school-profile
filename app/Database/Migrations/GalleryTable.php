<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GalleryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'album_id' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'title' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'headline' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'images' => [
                'type' => 'JSON',
                'null' => false,
            ],
            'date' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'on_update' => 'CURRENT_TIMESTAMP',
            ],
            'views' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery');
    }

    public function down()
    {
        $this->forge->dropTable('gallery');
    }
}