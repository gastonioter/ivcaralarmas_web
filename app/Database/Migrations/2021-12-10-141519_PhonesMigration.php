<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PhonesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'phone_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'phone_number'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique' => true,
            ],
            'phone_user_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ]
        ]);
        $this->forge->addKey('phone_id', true);
        $this->forge->createTable('phones');
    }

    public function down()
    {
        $this->forge->dropTable('phones');
    }
}
