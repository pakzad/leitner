<?php

namespace Database\Factories;

use App\Enums\UserLevelEnum;
use App\Models\Course;
use App\Models\Image;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
        'user_id' => User::Factory()->create()->id,
        'image_id' => Image::Factory()->create()->id,
        'language_id' => Language::Factory()->create()->id,
        'heading' => $this->faker->sentence,
        'content' => $this->faker->text(250),
        'excerpt' => $this->faker->paragraph,
        'is_private' => $this->faker->boolean,
        'parent_id' => null,
        'students_count' => $this->faker->numberBetween(0, 10000),
        'level' => randEnum(UserLevelEnum::class),
        ];
    }
}
