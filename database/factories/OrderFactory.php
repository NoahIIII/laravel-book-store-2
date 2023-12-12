<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>'1',
            'status'=>'pending',
            'total'=>$this->faker->numberBetween(100,1000),
            'total_after_discount'=>$this->faker->numberBetween(90,900),
            'created_at'=>now(),
        ];
    }
}
