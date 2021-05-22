<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ContactSeeder extends Seeder {
	public function run() {
		$faker = \Faker\Factory::create('id_ID');
		for ($i = 0; $i < 10; $i++) {
			$this->db->table('contacts')->insert([
				'name' => $faker->name(),
				'phone' => $faker->phoneNumber(),
				'email' => $faker->email(),
				'address' => $faker->address(),
				'picture' => null,
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			]);
		}
	}
}
