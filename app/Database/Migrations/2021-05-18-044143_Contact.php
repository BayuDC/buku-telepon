<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contact extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => 15
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'picture' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('contacts');
	}

	public function down() {
		$this->forge->dropTable('contacts');
	}
}