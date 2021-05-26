<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => 1,
                'name' => 'メニュー１',
                'icon' => 'fab fa-apple',
                'seq' => 1,
                'parent_menus_id' => 0,
                'features_id' => 1,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'name' => 'メニュー２',
                'icon' => 'fab fa-apple',
                'seq' => 2,
                'parent_menus_id' => 0,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 3,
                'name' => 'メニュー３',
                'icon' => 'fab fa-apple',
                'seq' => 3,
                'parent_menus_id' => 0,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 4,
                'name' => 'メニュー４',
                'icon' => 'fab fa-apple',
                'seq' => 4,
                'parent_menus_id' => 0,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 5,
                'name' => 'メニュー５',
                'icon' => 'fab fa-apple',
                'seq' => 5,
                'parent_menus_id' => 0,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 6,
                'name' => 'メニュー６',
                'icon' => 'fab fa-apple',
                'seq' => 6,
                'parent_menus_id' => 0,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 7,
                'name' => 'メニュー７',
                'icon' => 'fab fa-apple',
                'seq' => 7,
                'parent_menus_id' => 0,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],

            [
                'id' => 8,
                'name' => 'サブメニュー２－１',
                'icon' => 'fab fa-apple',
                'seq' => 1,
                'parent_menus_id' => 2,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 9,
                'name' => 'サブメニュー２－２',
                'icon' => 'fab fa-apple',
                'seq' => 2,
                'parent_menus_id' => 2,
                'features_id' => 0,
                'created_at' => new DateTime(),
            ],
        ]);
    }
}
