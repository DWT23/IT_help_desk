<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TicketChats extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'chat_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ticket_id' => [
                'type' => 'INT',
                'constraint' => 9,
            ],
            'sender_id' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('chat_id');
        $this->forge->addForeignKey('ticket_id', 'tickets', 'ticket_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('sender_id', 'employees', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ticket_chats');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('ticket_chats');
    }
}
