<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AchievementsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'achievement_id' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'type' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'name' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'major' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'level' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'year' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'images' => [
                'type' => 'JSON',
                'null' => true,
            ],
            'date' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'on_update' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achievements');
    }

    public function down()
    {
        $this->forge->dropTable('achievements');
    }
}