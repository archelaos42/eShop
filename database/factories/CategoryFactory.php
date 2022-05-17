<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = ['Electronics', 'Clothes', 'Tools', 'Books', 'Kitchenware', 'Miscellaneous'];
        foreach ($categories as $category)

            DB::table('Categories')->insert([
                'name' => $category,
                'slug' => $category,
                'description' => $this->faker->realText(100),
            ]);
    }
}




//'name' => $this->faker->word,
//            'slug' => $this->faker->word,
//            'description' => $this->faker->text,
