<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Classes extends Migration
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
			'class'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		];

		$this->forge->addField($fields);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('classes');
	}

	public function down()
	{
		$this->forge->dropTable('classes');
	}
}
