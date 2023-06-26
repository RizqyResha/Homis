<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SvcCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_svc_category')->insert([
            'svc_thumbnail' => 'noimage',
            'svc_name' => 'Decorator',
            'svc_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta nobis explicabo nulla eveniet culpa et perferendis, ut quia eius natus in tenetur repellat accusantium, eos iure dolore. Debitis, minima!'
        ]);

        DB::table('tbl_svc_category')->insert([
            'svc_thumbnail' => 'noimage',
            'svc_name' => 'Room Bliss',
            'svc_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta nobis explicabo nulla eveniet culpa et perferendis, ut quia eius natus in tenetur repellat accusantium, eos iure dolore. Debitis, minima!'
        ]);

        DB::table('tbl_svc_category')->insert([
            'svc_thumbnail' => 'noimage',
            'svc_name' => 'Garden Serenity',
            'svc_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta nobis explicabo nulla eveniet culpa et perferendis, ut quia eius natus in tenetur repellat accusantium, eos iure dolore. Debitis, minima!'
        ]);

        DB::table('tbl_svc_category')->insert([
            'svc_thumbnail' => 'noimage',
            'svc_name' => 'Flavorful delights',
            'svc_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta nobis explicabo nulla eveniet culpa et perferendis, ut quia eius natus in tenetur repellat accusantium, eos iure dolore. Debitis, minima!'
        ]);

        DB::table('tbl_svc_category')->insert([
            'svc_thumbnail' => 'noimage',
            'svc_name' => 'Home Cleaner',
            'svc_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta nobis explicabo nulla eveniet culpa et perferendis, ut quia eius natus in tenetur repellat accusantium, eos iure dolore. Debitis, minima!'
        ]);

        DB::table('tbl_svc_category')->insert([
            'svc_thumbnail' => 'noimage',
            'svc_name' => 'WashCare',
            'svc_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta nobis explicabo nulla eveniet culpa et perferendis, ut quia eius natus in tenetur repellat accusantium, eos iure dolore. Debitis, minima!'
        ]);
    }
}