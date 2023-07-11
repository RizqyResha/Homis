<?php

namespace Database\Seeders;

use App\Models\WithdrawalMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WithdrawalMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WithdrawalMethod::create(
            [
                'name' => 'OVO',
            ]
        );
        WithdrawalMethod::create(
            [
                'name' => 'GoPay',
            ]
        );
        WithdrawalMethod::create(
            [
                'name' => 'ShopeePay',
            ]
        );
    }
}