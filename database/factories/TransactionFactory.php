<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_svc' => rand(1, Service::count()),
            'id_client' => rand(1, Client::count()),
            'transaction_date' => fake()->dateTimeBetween($startDate = '-1 years', $endDate = '-5 month', $timezone = null),
            'transaction_finish_date' => fake()->dateTimeBetween($startDate = '-4 month', $endDate = '-1 month', $timezone = null),
            'price_total' => rand(10000, 1000000),
            'period_type' => fake()->randomElement(['Hourly', 'Daily', 'Weekly', 'Monthly']),
            'confirm_client' => 0,
            'confirm_servicer' => 0,
            'status' => 'Pending'
        ];
    }
}