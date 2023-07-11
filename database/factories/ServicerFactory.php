<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicer>
 */
class ServicerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName,
            'email' => fake()->email,
            'password' => bcrypt('password'),
            'profile_image' => 'noimage',
            'id_identity_type' => rand(1, 2),
            'identity_id' => Str::random(20),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'gender' => fake()->randomElement(['Male', 'Female']),
            'address' => fake()->address,
            'phone_no' => fake()->phoneNumber,
            'isActive' => '1',
            'balance' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'delete_status' => '0',
            'remember_token' => Str::random(10),
        ];
    }
}