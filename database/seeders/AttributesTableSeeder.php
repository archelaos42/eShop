<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Attributes')->insert([
            'name'          =>  'Size',
            'frontend_type' =>  'select',
            'is_filterable' =>  1,
        ]);

        // Create a color attribute
        DB::table('Attributes')->insert([
            'name'          =>  'Color',
            'frontend_type' =>  'select',
            'is_filterable' =>  1,
        ]);

        // Create a price attribute
        DB::table('Attributes')->insert([
            'name'          =>  'Price',
            'frontend_type' =>  'text',
            'is_filterable' =>  1,
        ]);

        // Create a sales price attribute
        DB::table('Attributes')->insert([
            'name'          =>  'SalePrice',
            'frontend_type' =>  'text',
            'is_filterable' =>  1,
        ]);

        // Create a test attribute
        DB::table('Attributes')->insert([
            'name'          =>  'test',
            'frontend_type' =>  'radio',
            'is_filterable' =>  1,
        ]);

    }
}
