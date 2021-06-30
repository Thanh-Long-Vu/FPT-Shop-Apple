<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            ['id_role' => 1,'name_role' => "Admin"],
            ['id_role' => 2,'name_role' => "Co-admin"],
            ['id_role' => 3,'name_role' => "User"],
            ['id_role' => 4,'name_role' => "Guest"]
        ]);
    }
}
