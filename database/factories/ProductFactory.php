<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'brand_id' =>  random_int(1, 3),
            'category_id' => random_int(1, 6),
            'subcategory_id' => random_int(1, 2),
            'description' => $this->faker->realText(100),
            'name' => $this->faker->word,
            'slug' => $this->faker->word,
            'quantity' => random_int(1, 50),
        ];
    }
}
