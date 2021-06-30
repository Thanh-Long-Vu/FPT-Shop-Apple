<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0;$i<=20;$i++) {
            DB::table('category')->insert([
                [
                    'title' => $faker->name,
                    'thumbnail' => 1,
                    'description' => 1,
                    'name' => $faker->name,
                    'active' => rand(0,1),
                    'total_product' => 1,
                ]
            ]);
        }
    }
}
