<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class IdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_identity_type')->insert([
            'identity_name' => 'KTP',
        ]);

        DB::table('tbl_identity_type')->insert([
            'identity_name' => 'PASSPOR',
        ]);
    }
}
