<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('classes')->insert(['class' => 'X IPA']);

        $this->db->table('classes')->insert(['class' => 'XI IPA']);

        $this->db->table('classes')->insert(['class' => 'XII IPA']);

        $this->db->table('classes')->insert(['class' => 'X IPS']);

        $this->db->table('classes')->insert(['class' => 'XI IPS']);

        $this->db->table('classes')->insert(['class' => 'XII IPS']);
    }
}
