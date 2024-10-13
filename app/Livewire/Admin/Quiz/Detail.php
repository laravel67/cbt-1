<?php

namespace App\Livewire\Admin\Quiz;

use App\Models\Tier;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Soal Tingkat')]
class Detail extends Component
{
    public $tierId;
    public $tierName;
    public $quizzes;
    public $answers = [];

    public function mount($id)
    {
        $this->tierId = $id;
        $tier = Tier::findOrFail($this->tierId);
        $this->tierName = $tier->name;
        $this->quizzes = $tier->quizzes;
        foreach ($this->quizzes as $quiz) {
            $this->answers[$quiz->id] = $quiz->answers;
        }
    }
    public function render()
    {
        return view('pages.admin.quiz.detail',[
            'quizzes' => $this->quizzes,
            'tierName' => $this->tierName,
            'answers' => $this->answers,
        ]);
    }
}
