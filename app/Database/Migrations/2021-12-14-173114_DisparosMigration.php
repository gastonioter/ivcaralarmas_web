<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DisparosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'disparos_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'disparos_value'       => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'disparos_device_serie'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            
            'created_at datetime default current_timestamp',

        ]);
        $this->forge->addKey('disparos_id', true);
        $this->forge->createTable('disparos');
    }

    public function down()
    {
        $this->forge->dropTable('disparos');
    }
}
