<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'id' => 1,
                'name' => 'サンプル',
                'icon' => 'fab fa-apple',
                'seq' => 1,
                'url' => 'example',
                'created_at' => new DateTime(),
            ],
        ]);
    }
}
