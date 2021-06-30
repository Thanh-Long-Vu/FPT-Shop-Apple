<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id_user' => 1,'name' => "Admin", 'email' => 'admin@gmail.com', 'password' => '$2y$10$1eqX3J1AkfkPNB.V4PDDEOPnPdsqzZ1m3ltqsBxEGEO0n/RE6XTdm', 'role_id' => 1, 'created_at' => '2021-05-16 03:58:17', 'updated_at' => '2021-05-16 03:58:17']
        ]);
    }
}
