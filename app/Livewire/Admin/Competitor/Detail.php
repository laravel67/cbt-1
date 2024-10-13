<?php

namespace App\Livewire\Admin\Competitor;

use App\Models\User;
use Livewire\Component;

class Detail extends Component
{
    public $competitor;

    public function mount($id)
    {
        // Load competitor data directly from User with associated Tier
        $this->competitor = User::with('tier')->findOrFail($id);
    }

    public function render()
    {
        return view('pages.admin.competitor.detail', [
            'competitor' => $this->competitor
        ]);
    }
}
