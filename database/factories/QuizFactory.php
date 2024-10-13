<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Tier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'tier_id' => $this->faker->numberBetween(1, 3),
            'quiz_text' => $this->faker->sentence,
            'point' => $this->faker->numberBetween(1, 10),
            'correct_answer' => $this->faker->word, // This will be the correct answer
        ];
    }
}
