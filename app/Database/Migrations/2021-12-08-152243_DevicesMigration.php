<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DevicesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'device_id'          => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'device_alias'       => [
            'type'       => 'VARCHAR',
            'constraint' => '20',
        ],
        'device_serie'       => [
            'type'       => 'VARCHAR',
            'constraint' => '15',
            'unique'     => TRUE,
        ],
        'device_status'       => [
            'type'       => 'VARCHAR',
            'constraint' => '15',
        ],
        'device_category_id'       => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
        ],
        'device_user_id'       => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
        ]
        ]);
        $this->forge->addKey('device_id', true);
        $this->forge->createTable('devices');
    }

    public function down()
    {
        $this->forge->dropTable('devices');
    }
}
