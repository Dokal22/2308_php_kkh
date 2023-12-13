<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            ['user_id' => 'php504', 'user_pw' => 'php504','user_name'=> 'Gwanho','created_at'=> '2023-03-29 11:11:11'],
            ['user_id' => 'Duck1234', 'user_pw' => 'qwer1234','user_name'=> 'Duck','created_at'=> '2023-01-01 11:11:11'],
            ['user_id' => 'Frog1234', 'user_pw' => 'qwer1234','user_name'=> 'Frog','created_at'=> '2023-02-02 11:11:11'],
            ['user_id' => 'GuineaPig1234', 'user_pw' => 'qwer1234','user_name'=> 'GuineaPig','created_at'=> '2023-03-03 11:11:11'],
            ['user_id' => 'Hamster1234', 'user_pw' => 'qwer1234','user_name'=> 'Hamster','created_at'=> '2023-04-04 11:11:11'],
            ['user_id' => 'Hen1234', 'user_pw' => 'qwer1234','user_name'=> 'Hen','created_at'=> '2023-05-05 11:11:11'],
            ['user_id' => 'Icecream1234', 'user_pw' => 'qwer1234','user_name'=> 'Icecream','created_at'=> '2023-06-06 11:11:11'],
            ['user_id' => 'Mouse1234', 'user_pw' => 'qwer1234','user_name'=> 'Mouse','created_at'=> '2023-07-07 11:11:11'],
            ['user_id' => 'Penguin1234', 'user_pw' => 'qwer1234','user_name'=> 'Penguin','created_at'=> '2023-08-08 11:11:11'],
            ['user_id' => 'Sloth1234', 'user_pw' => 'qwer1234','user_name'=> 'Sloth','created_at'=> '2023-09-09 11:11:11']
        ]);
    }
}
