<?php

namespace App\Livewire\Home;

use App\Models\Quiz;
use App\Models\Score;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Exam extends Component
{
    public $tierId;
    public $userId;
    public $selectedAnswers = [];

    public function mount(){
        $this->tierId = Auth::user()->tier->id;
        $this->userId = Auth::user()->id;
    }

    public function render()
    {
        $quizs = Quiz::with('answers')->where('tier_id', $this->tierId)->orderBy('id', 'desc')->get();
        return view('pages.home.exam', compact('quizs'));
    }

    public function sending()
    {
        $this->validate([
            'selectedAnswers.*' => 'required|string', // Pastikan jawaban adalah string
        ]);
        foreach ($this->selectedAnswers as $quizId => $answerText) {
            Score::create([
                'user_id' => $this->userId,
                'quiz_id' => $quizId,
                'selected_answer' => $answerText,
            ]);
        }

        return redirect()->route('competitorProfile')->with('message', 'Jawaban Anda berhasil disimpan!');
    }
}
