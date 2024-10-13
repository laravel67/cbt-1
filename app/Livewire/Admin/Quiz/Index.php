<?php

namespace App\Livewire\Admin\Quiz;

use App\Models\Quiz;
use App\Models\Tier;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $idTier;

    protected $listeners=[
        'deleteConfirmedQuiz'=> 'destroy'
    ];

    public function destroy(){
        $quizs = Quiz::where('tier_id', $this->idTier)->with('answers')->get();
        if ($quizs->isNotEmpty()) {
            foreach ($quizs as $quiz) {
                $quiz->answers()->delete();
                $quiz->delete();
            }
            $message = "Kuis berhasil dihapus!";
            $route=route('quizIndex');
            $this->dispatch('success', ['message' => $message, 'route'=>$route]);
        }
    }
    
    public function render()
    {
        $tiers=Tier::orderBy('id', 'desc')->paginate(5);
        return view('pages.admin.quiz.index', compact('tiers'));
    }
}
