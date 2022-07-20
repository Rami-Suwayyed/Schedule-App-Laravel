<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'status'=>$this->faker->numberBetween(0,1),
            'published_at'=>$this->faker->dateTimeBetween('-1 years','now','Asia/Amman')
        ];
    }
}
