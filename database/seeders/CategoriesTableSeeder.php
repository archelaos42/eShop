<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $categories = ['Electronics', 'Clothes', 'Tools', 'Books', 'Kitchenware', 'Miscellaneous'];
//        foreach ($categories as $category) {
//
//            DB::table('Categories')->insert([
//                'name' => $category,
//                'slug' => $category,
//                'description' => 'Some description',
//            ]);
//        }



        Category::factory(10)->create();
    }
}
