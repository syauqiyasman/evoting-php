<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Result extends Migration
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
			// 'id_users'    => [
			// 	'type'           => 'INT',
			// 	'constraint'     => 11,
			// ],
			'id_ketua'    => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned' => true,
			],
			'id_wakil'    => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned' => true,
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
		// $this->forge->addForeignKey('id_users', 'users', 'id', 'CASCADE', 'NO ACTION');
		$this->forge->addForeignKey('id_ketua', 'ketua', 'id');
		$this->forge->addForeignKey('id_wakil', 'wakil', 'id');
		$this->forge->createTable('results');
	}

	public function down()
	{
		$this->forge->dropTable('results');
	}
}
