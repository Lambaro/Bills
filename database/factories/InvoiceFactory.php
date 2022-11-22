<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'     => User::find(rand(1, 2))->id,
            'reciever_id' => User::find(rand(1, 2))->id,
            'amount'      => $this->faker->numberBetween(1000, 20000),
            'status'      => rand(0, 3)
        ];
    }
}
