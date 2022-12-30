<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "identity" => $this->faker->randomNumber(5,true),
            "address" => $this->faker->text(),
            "city" => $this->faker->currencyCode(),
            "publiccheck" => $this->faker->boolean(),
            "visits" => $this->faker->numberBetween(1,3),
            "date" => $this->faker->date(),
            "email" => $this->faker->unique()->safeEmail(),
            "phone_nr" => $this->faker->randomNumber(5,true),
            "start" => now(),
        ];
    }
}
