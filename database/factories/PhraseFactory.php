<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Phrase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhraseFactory extends Factory
{
    protected $model = Phrase::class;

    public function definition(): array
    {
        return [
        'phrase' => $this->faker->unique()->sentence,
        'mean',
        'mistake_count' =>$this->faker->randomDigit(),
        'user_id' => User::Factory()->create()->id,
        'course_id' => Course::Factory()->create()->id,
        'parent_id' => null
        ];
    }
}
