<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0;$i<=50;$i++) {
            DB::table('products')->insert([
                [
                    'name' => $faker->name,
                    'price' => rand(1000,5000),
                    'discount' => rand(100,500),
                    'is_hot' => rand(0,1),
                    'active' => rand(0,1),
                    'active_quantity' => rand(0,1),
                    'product_type_id' => ProductType::all()->random(1)->first()->id_product_type ,
                    'thumbnail' => "assets/img/246X176/img2.jpg",
                    'warehouse_id' => rand(1,50),
                ]
            ]);
        }
    }
}
