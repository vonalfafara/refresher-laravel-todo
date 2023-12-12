<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => fake()->randomElement(User::pluck("id")),
            "title" => fake()->sentence(),
            "task" => fake()->paragraph(),
            "status" => fake()->randomElement(["Not Started", "Ongoing", "Completed"])
        ];
    }
}
