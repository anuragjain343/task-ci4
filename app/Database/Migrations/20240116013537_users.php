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
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'firstName' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'lastName' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'profilePic' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'dob' => [
                'type'       => 'DATE',
                 'null' => false,    
            ],
            'gender' => [
                'type' => 'ENUM("Male","female")',
                'null' => false,
            ],
            'userRole' => [
                'type' => 'ENUM("admin","user")',
                'null' => false,
            ],
            'createdAt' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'updatedAt' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'deleted_at'=> [
                'type'  => 'datetime',
                 'null' => true,    
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}