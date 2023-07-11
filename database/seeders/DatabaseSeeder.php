<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(IdentitySeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ServicerSeeder::class);
        $this->call(SvcCategorySeeder::class);
        $this->call(SvcSeeder::class);
        $this->call(SvcPriceSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(DetailTransactionSeeder::class);
        $this->call(WithdrawalMethodSeeder::class);
    }
}