<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $colors = ['red', 'yellow', 'blue', 'pink'];
        for ($i=0;$i<=50;$i++) {
            DB::table('warehouse')->insert([
                [
                    'name' => $faker->name,
                    'price' => rand(1000,5000),
                    'quantity' => rand(100,500),
                    'warranty' => rand(1,10),
                    'IMEI' => rand(1,10),
                    'memory' => rand(1,10),
                    'color' =>  $colors[array_rand($colors)],
                    'active' => rand(0,1),
                ]
            ]);
        }
    }
}
