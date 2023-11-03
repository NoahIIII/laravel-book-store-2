<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branche>
 */
class BrancheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>fake()->word(),
            'short_address'=>fake()->address(),
            'full_address'=>fake()->address(),
            'email'=>fake()->unique()->email(),
            'phone'=>fake()->phoneNumber(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
