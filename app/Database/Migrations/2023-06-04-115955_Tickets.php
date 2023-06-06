<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tickets extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField('id');
        $this->forge->addField([
            'summary' => ['type' => 'VARCHAR', 'constraint' => 255],
            'assignee' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'creator' => ['type' => 'VARCHAR', 'constraint' => 20],
            'organization' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT', 'null' => true],
            'priority' => ['type' => 'VARCHAR', 'constraint' => 50],
            'category' => ['type' => 'VARCHAR', 'constraint' => 50],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'due_date' => ['type' => 'DATE'],
            'response_time' => ['type' => 'VARCHAR', 'constraint' => 50],
            'close_time' => ['type' => 'DATE', 'null' => true],
        ]);
        $this->forge->addForeignKey('assignee', 'employees', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('creator', 'employees', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tickets');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}
