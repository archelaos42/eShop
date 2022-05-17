<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['1', '2', '3', '4', '5', '6'];
        foreach ($categories as $category) {

            DB::table('Subcategories')->insert([
                'name' => 'Subcategory 1',
                'slug' => 'Subcategory 1',
                'category_id' => $category,
                'description' => 'Some description',
            ]);

            DB::table('Subcategories')->insert([
                'name' => 'Subcategory 2',
                'slug' => 'Subcategory 2',
                'category_id' => $category,
                'description' => 'Some description',
            ]);
        }
    }
}
