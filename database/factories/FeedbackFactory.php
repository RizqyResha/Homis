<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
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
            'description' => fake()->text(),
            'rate_point' => rand(1, 5),
            'created_at' => fake()->dateTime()
        ];
    }
}