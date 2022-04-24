<?php

namespace Database\Factories;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;

class FriendFactory extends Factory
{
    protected $model = Friend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 30),
            'friend_id' => $this->faker->numberBetween($min = 1, $max = 30),
        ];
    }
}
