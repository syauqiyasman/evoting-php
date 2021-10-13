<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ketua extends Migration
{
	public function up()
	{
		$fields = [
			'id_ketua'          => [
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
				'constraint'     => 11,
				'unsigned' => true,
			],
			'visi' => [
				'type'           => 'TEXT',
				'null'		     => true,
			],
			'misi' => [
				'type'           => 'TEXT',
				'null'		     => true,
			],
			'image'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'status' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'default'        => 1,
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
		$this->forge->addPrimaryKey('id_ketua');
		$this->forge->addForeignKey('id_class', 'classes', 'id_class');
		$this->forge->createTable('ketua');
	}

	public function down()
	{
		$this->forge->dropTable('ketua');
	}
}
