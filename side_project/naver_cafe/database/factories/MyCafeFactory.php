<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyCafe>
 */
class MyCafeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $first_cafe = Cafe::where('address','http://192.168.0.104/cheers')->first();
        // $rand_user = User::all()->random();
        return [
            // 'cafe_number' => $first_cafe->cafe_name,
            // 'user_number'=> $rand_user->id,
            // 'visit'=>random_int(1,100),
            // 'level'=>random_int(1,10),
            // 'file_number'=> $rand_user->id
        ];
    }
}
