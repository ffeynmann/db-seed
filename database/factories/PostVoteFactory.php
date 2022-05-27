<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostVoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $userIdMax, $postMaxId;
        is_null($userIdMax) && $userIdMax = User::max('id');
        is_null($postMaxId) && $postMaxId = Post::max('id');

        $votes = [-1, 1, 1, 1];

        return [
            'user_id' => rand(1, $userIdMax),
            'post_id' => rand(1, $postMaxId),
            'vote'    => $votes[rand(0, 3)]
        ];
    }
}
