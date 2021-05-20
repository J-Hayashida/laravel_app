<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '総務　一郎',
                'email' => 'aaa1@aaa.com',
                'password' => '$2y$10$mg.DapKwrQU9LxbFz9IlKe/D00RtbTHQd0nVRQ70Qn4b5DT7UDe5i',
                'groups_id' => 1,
                'created_at' => new DateTime(),
            ],
            [
                'name' => '総務　次郎',
                'email' => 'aaa2@aaa.com',
                'password' => '$2y$10$mg.DapKwrQU9LxbFz9IlKe/D00RtbTHQd0nVRQ70Qn4b5DT7UDe5i',
                'groups_id' => 1,
                'created_at' => new DateTime(),
            ],
            [
                'name' => '総務　三郎',
                'email' => 'aaa3@aaa.com',
                'password' => '$2y$10$mg.DapKwrQU9LxbFz9IlKe/D00RtbTHQd0nVRQ70Qn4b5DT7UDe5i',
                'groups_id' => 1,
                'created_at' => new DateTime(),
            ],
            [
                'name' => '営業　一郎',
                'email' => 'bbb1@aaa.com',
                'password' => '$2y$10$mg.DapKwrQU9LxbFz9IlKe/D00RtbTHQd0nVRQ70Qn4b5DT7UDe5i',
                'groups_id' => 2,
                'created_at' => new DateTime(),
            ],
            [
                'name' => '営業　次郎',
                'email' => 'bbb2@aaa.com',
                'password' => '$2y$10$mg.DapKwrQU9LxbFz9IlKe/D00RtbTHQd0nVRQ70Qn4b5DT7UDe5i',
                'groups_id' => 2,
                'created_at' => new DateTime(),
            ],
        ]);
    }
}
