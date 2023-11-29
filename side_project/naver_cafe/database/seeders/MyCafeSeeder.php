<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cafe;
use App\Models\User;
use App\Models\File;
use Carbon\Carbon;

class MyCafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_cafe = Cafe::where('address', 'http://192.168.0.104/cheers')->first();
        for ($i = 1; $i <= 10; $i++) {
            $nth_user = User::where('id', $i)->first();
            $profile = File::where('user_number', $nth_user->id)->where('flg',2)->first();
            $rand_day = Carbon::now()->subDays(rand(1, 365));

            DB::table("my_cafes")->insert([
                [
                    'cafe_number' => $first_cafe->id,
                    'user_number' => $nth_user->id,
                    'visit' => random_int(1, 100),
                    'level' => random_int(1, 10),
                    'file_number' => $profile->id,
                    'created_at'=>$rand_day
                ]
            ]);
        }
    }
}
