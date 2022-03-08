<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => TRUE,
            ],
            'user_password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'user_type' => [
                'type' => 'ENUM',
                'constraint' => ['admin','regular'],
                'default' => 'regular',
                
            ],
            'last_login' => [
                'type' => 'DATETIME',
                
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            
            'created_at datetime default current_timestamp',
            
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
