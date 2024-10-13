<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    public function definition()
    {
        return [
            'quiz_id' => Quiz::factory(), // Link to a Quiz instance
            'answer' => $this->faker->word,
        ];
    }

    public function correctAnswer($correctAnswer)
    {
        return $this->state(function () use ($correctAnswer) {
            return [
                'answer' => $correctAnswer,
            ];
        });
    }
}
