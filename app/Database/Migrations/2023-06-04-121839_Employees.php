<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nip' => ['type' => 'VARCHAR', 'constraint' => 20],
            'fullname' => ['type' => 'VARCHAR', 'constraint' => 255],
            'photo' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'phone_number' => ['type' => 'VARCHAR', 'constraint' => 20],
            'address' => ['type' => 'TEXT'],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'birth_date' => ['type' => 'DATE'],
            'gender' => ['type' => 'ENUM("Male", "Female")'],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('nip', true);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
