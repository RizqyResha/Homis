<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Client::factory()->count(1)->create();
        $id_client = Client::insertGetId([
            'username' => 'minerf',
            'email' => 'client@client.com',
            'password' => bcrypt('password'),
            'profile_image' => 'noimage',
            'id_identity_type' => rand(1, 2),
            'identity_id' => Str::random(20),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'gender' => fake()->randomElement(['male', 'female']),
            'address' => fake()->address,
            'phone_no' => fake()->phoneNumber,
            'isActive' => '1',
            'created_at' => now(),
            'updated_at' => now(),
            'delete_status' => '0',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'minerf',
            'email' => 'client@client.com',
            'password' => bcrypt('password'),
            'user_id' => $id_client,
            'user_type' => 'client'
        ]);
    }
}