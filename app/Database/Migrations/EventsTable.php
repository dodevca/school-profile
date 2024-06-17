<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'event_id' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'name' => [
                'type' => 'TINYTEXT',
                'null' => false,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 512,
                'null' => false,
            ],
            'date_start' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'date_end' => [
                'type' => 'DATETIME',
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
        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}