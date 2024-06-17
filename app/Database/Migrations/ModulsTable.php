<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModulsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'modul_id' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'title' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'major' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'writer' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'teacher' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'tags' => [
                'type' => 'JSON',
                'null' => false,
            ],
            'modul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('moduls');
    }

    public function down()
    {
        $this->forge->dropTable('moduls');
    }
}