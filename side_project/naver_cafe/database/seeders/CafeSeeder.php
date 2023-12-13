<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bangJang = User::where('user_id', 'php504')->first();
        DB::table("cafes")->insert([
            ['cafe_name' => '치얼쓰', 'user_number' => $bangJang->id, 'address' => '/cheers', 'introduct' => '첫 카페 개장']
        ]);
    }
}
