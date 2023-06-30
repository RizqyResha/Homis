<?php

namespace Database\Seeders;

use App\Models\Servicer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicer::factory()->count(10)->create();
    }
}