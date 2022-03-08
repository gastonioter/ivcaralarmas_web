<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ActdesactMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'actdesact_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'actdesact_value'       => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'actdesact_device_serie'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('actdesact_id', true);
        $this->forge->createTable('actdesacts');
    }

    public function down()
    {
        $this->forge->dropTable('actdesacts');
    }
}
