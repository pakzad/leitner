<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
          'user_id' => User::factory()->create()->id,
          'course_id' => Course::factory()->create()->id,
          'duration' => $this->faker->randomNumber(2),
        ];
    }
}
