<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        for ($x = 1; $x <= 5; $x++) {
            $this->db->table("classes")->insert(["class" => "X IPA $x"]);
        }

        for ($x = 1; $x <= 5; $x++) {
            $this->db->table("classes")->insert(["class" => "XI IPA $x"]);
        }

        for ($x = 1; $x <= 5; $x++) {
            $this->db->table("classes")->insert(["class" => "XII IPA $x"]);
        }

        for ($x = 1; $x <= 5; $x++) {
            $this->db->table("classes")->insert(["class" => "X IPS $x"]);
        }

        for ($x = 1; $x <= 5; $x++) {
            $this->db->table("classes")->insert(["class" => "XI IPS $x"]);
        }

        for ($x = 1; $x <= 5; $x++) {
            $this->db->table("classes")->insert(["class" => "XII IPS $x"]);
        }

        $this->db->table("classes")->insert(["class" => "Kepala Sekolah"]);
        $this->db->table("classes")->insert(["class" => "Guru"]);
        $this->db->table("classes")->insert(["class" => "Lain-lain"]);
    }
}
