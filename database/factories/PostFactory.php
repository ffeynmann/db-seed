<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        static $userIdMax;
        is_null($userIdMax) && $userIdMax = User::max('id');
        
        return [
            'user_id'    => rand(1, $userIdMax),
            'title'      => $this->faker->text(200),
            'content'    => $this->faker->text(2000),
            'created_at' => $this->faker->dateTimeBetween('-30 days', '-1 days')
        ];
    }
}
