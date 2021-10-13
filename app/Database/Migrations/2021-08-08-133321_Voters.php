<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Voters extends Migration
{
	public function up()
	{
		$fields = [
			'id_voter'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'id_class'      => [
				'type'           => 'INT',
				'unsigned' => true,
				'constraint'     => 11,
			],
			'username' => [
				'type'           => 'VARCHAR',
				'constraint'     => 64,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'status' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'default'        => 1,
			],
			'voted_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
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
		$this->forge->addPrimaryKey('id_voter');
		$this->forge->addForeignKey('id_class', 'classes', 'id_class');
		$this->forge->createTable('voters');
	}

	public function down()
	{
		$this->forge->dropTable('voters');
	}
}
