<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("board_types")->insert([
            ['name' => '공지사항'],
            ['name'=> '자유게시판'],
            ['name'=> '질문게시판'],
            ['name'=> '유머게시판']
        ]);
    }
}
