<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminMigration extends Migration
{
    public function up()
    {
        $fields = [
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'password'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],

        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
