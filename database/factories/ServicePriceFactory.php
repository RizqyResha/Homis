<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServicePrice>
 */
class ServicePriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'id_svc' => fake()->numberBetween(1, Service::count()),
            'price_per_period' => rand(1000, 1000000),
            'period_type' => fake()->randomElement(['Hourly', 'Daily', 'Weekly', 'Monthly']),
        ];
    }




}