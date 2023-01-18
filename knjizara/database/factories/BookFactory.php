<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2,10,40),
            'description' => $this->faker->sentence(),
            'name' => $this->faker->name(),
            'category' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}
