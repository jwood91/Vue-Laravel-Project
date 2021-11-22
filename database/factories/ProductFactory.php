<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;



class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'=> $this->faker->productName,
            'price'=> $this->faker->randomFloat(2, 0.1, 100.99),
            'description'=>$this->faker->sentence,
            'stock'=>$this->faker->numberBetween(0, 100),


        ];
    }
}
