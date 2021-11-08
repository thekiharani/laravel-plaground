<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->unique()->e164PhoneNumber(),
            'last_contacted' => now()->subMinutes(random_int(0, 720)),
            'is_active' => $this->faker->randomElement([0, 1])
        ];
    }
}
