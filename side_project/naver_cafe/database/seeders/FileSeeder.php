<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("files")->insert([
            ['user_number'=> 1,'address' => '../img/free-sticker-duck-12971370.png', 'flg' => '2'],
            ['user_number'=> 2,'address' => '../img/free-sticker-guinea-pig-12971367.png', 'flg' => '2'],
            ['user_number'=> 3,'address' => '../img/free-sticker-hamster-12971383.png', 'flg' => '2'],
            ['user_number'=> 4,'address' => '../img/free-sticker-hen-12971368.png', 'flg' => '2'],
            ['user_number'=> 5,'address' => '../img/free-sticker-ice-cream-12971369.png', 'flg' => '2'],
            ['user_number'=> 6,'address' => '../img/free-sticker-mouse-12971381.png', 'flg' => '2'],
            ['user_number'=> 7,'address' => '../img/free-sticker-penguin-12971371.png', 'flg' => '2'],
            ['user_number'=> 8,'address' => '../img/free-sticker-frog-12971372.png', 'flg' => '2'],
            ['user_number'=> 9,'address' => '../img/free-sticker-sloth-12971375.png', 'flg' => '2'],
            ['user_number'=> 10,'address' => '../img/s.png', 'flg' => '1'],
        ]);
    }
}
