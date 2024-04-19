<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_random = User::all()->random();

        while (count($user_random->categories) == 0) {
            $user_random = User::all()->random();
        }

        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(100),
            'due_date' => $this->faker->dateTime(),
            'user_id' => $user_random,
            'category_id' => $user_random->categories->random(),
        ];
    }
}
