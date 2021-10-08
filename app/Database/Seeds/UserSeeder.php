<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'name'     => $faker->name(),
                'status'     => $faker->randomElement(['active', 'pending', 'banned']),
            ];
            $this->db->table('users')->insert($data);
        }
    }
}
