<?php

namespace Database\Seeders;

use App\Models\Servicer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class ServicerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_servicer = Servicer::insertGetId(
            [
                'username' => 'minmin',
                'email' => 'servicer@servicer.com',
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
            ]
        );

        User::create([
            'name' => 'minmin',
            'email' => 'servicer@servicer.com',
            'password' => bcrypt('password'),
            'user_id' => $id_servicer,
            'user_type' => 'servicer'
        ]);
    }
}