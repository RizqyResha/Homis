<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $datas = Transaction::all();

        // foreach ($datas as $row) {
        //     DetailTransaction::create([
        //         'id_transaction' => $row->id_transaction,
        //         'work_time' => fake()->dateTime(),
        //         'first_name' => fake()->firstName(),
        //         'period_qty' => rand(1, 5),
        //         'last_name' => fake()->lastName(),
        //         'phone_number' => fake()->phoneNumber(),
        //         'email' => fake()->email(),
        //         'address' => fake()->address()
        //     ]);
        // }
    }
}