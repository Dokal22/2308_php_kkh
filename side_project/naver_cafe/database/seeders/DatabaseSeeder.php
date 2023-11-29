<?php

namespace Database\Seeders;

use Database\Factories\NcBoardFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NcBoard;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<1;$i++){
            NcBoard::factory(5)->create();
        }
        // $this->call([ // 시더콜?
        //     NcBoardFactory::class,
        // ]);
    }
}
