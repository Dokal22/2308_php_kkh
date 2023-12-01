<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NcBoard>
 */
class NcBoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $faker = $this->faker; 
        $faker = FakerFactory::create();
        $rand = random_int(0,1);
        $date = $rand === 0 ? $faker->dateTimeBetween('-6 months') : null;
        return [
            'cafe_number'=>1,
            'board_type'=>random_int(1,4),
            'user_number' => random_int(1,10),
            'title' => $faker->realText(20),
            'content' => $faker->realText(50),
            'view' => random_int(1,20),
            'like' => random_int(1,20),
            'comment_cnt' => 0,
            'created_at'=> $faker->dateTimeBetween('-1 years','-6 months'),
            'updated_at'=> $date
        ];
    }
}
