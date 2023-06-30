<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServicePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SvcPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $svc = Service::pluck('id_svc')->toArray();
        $period = array('Hourly', 'Daily', 'Weekly', 'Monthly');
        foreach ($svc as $svcid) {
            foreach ($period as $periodtype) {
                ServicePrice::create(
                    [
                        'id_svc' => $svcid,
                        'price_per_period' => rand(1000, 1000000),
                        'period_type' => $periodtype,
                    ]
                );
            }
        }
    }
}