<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'id' => 1,
                'name' => '総務部',
                'seq' => 1,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'name' => '営業部',
                'seq' => 2,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 3,
                'name' => '第１開発課第１グループ',
                'seq' => 3,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 4,
                'name' => '第１開発課第２グループ',
                'seq' => 4,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 5,
                'name' => '第１開発課第３グループ',
                'seq' => 5,
                'created_at' => new DateTime(),
            ],
            [
                'id' => 6,
                'name' => '第１開発課第４グループ',
                'seq' => 6,
                'created_at' => new DateTime(),
            ],
        ]);
    }
}
