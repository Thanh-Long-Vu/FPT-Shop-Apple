<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeTableSeeder extends Seeder
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
            DB::table('product_types')->insert([
                [
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'data' => $faker->text,
                    'active' => rand(0,1),
                    'thumbnail' => "assets/img/246X176/img2.jpg",
                    'category_id' => Category::all()->random(1)->first()->id_category,
                ]
            ]);
        }
    }
}
