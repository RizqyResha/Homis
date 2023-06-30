<?php

namespace Database\Factories;

use App\Models\ServiceCategory;
use App\Models\Servicer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_servicer' => fake()->numberBetween(1, Servicer::count()),
            'id_svc_category' => fake()->numberBetween(1, ServiceCategory::count()),
            'thumbnail_image' => 'noimage',
            'description' => fake()->sentence(20)
        ];
    }
}