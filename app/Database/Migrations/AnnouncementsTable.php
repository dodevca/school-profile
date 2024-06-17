<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AnnouncementsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'announcement_id' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'title' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'attachment' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'important' => [
                'type' => 'INT',
                'null' => true,
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
        $this->forge->createTable('announcements');

    }

    public function down()
    {
        $this->forge->dropTable('announcements');
    }
}