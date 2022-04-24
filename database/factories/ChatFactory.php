<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatFactory extends Factory
{
    protected $model = Chat::class;
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
            'chat' => $this->faker->text($maxNbChars = 150)
        ];
    }
}
