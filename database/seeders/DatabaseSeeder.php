<?php

namespace Database\Seeders;

use App\Models\Quiz;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tier;
use App\Models\User;
use App\Models\Answer;
use App\Models\Competitor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $names=['SD','MTS', 'SMA'];
        foreach($names as $name){
            Tier::factory()->create([
                'name'=>$name
            ]);
        }

        User::factory(10)->create();

        Quiz::factory()
            ->count(10) // Number of quizzes you want to generate
            ->create()
            ->each(function ($quiz) {
                // Create 3 incorrect answers
                Answer::factory()->count(3)->create([
                    'quiz_id' => $quiz->id,
                ]);

                // Create 1 correct answer
                Answer::factory()->correctAnswer($quiz->correct_answer)->create([
                    'quiz_id' => $quiz->id,
                ]);
            });
    }
}
