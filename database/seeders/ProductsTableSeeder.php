<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'brand_id' =>  (1),
            'category_id' => (1),
            'subcategory_id' => (1),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Fusce hendrerit euismod viverra. In eleifend fermentum maximus. Praesent
             nunc ligula, scelerisque at lorem a, ultrices consectetur erat. Suspendisse
             potenti. Suspendisse potenti. Sed faucibus vestibulum nunc sit amet suscipit.
             Pellentesque in egestas ex, et vestibulum mauris.',
            'FeaturedImage',
            'name' => 'Mixer',
            'slug' => 'Mixer',
            'quantity' => 50,
        ]);
    }
}
