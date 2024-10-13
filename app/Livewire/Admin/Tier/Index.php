<?php

namespace App\Livewire\Admin\Tier;

use App\Models\Tier;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $tiers=Tier::latest('id', 'desc')->paginate(10);
        return view('pages.admin.tier.index', compact('tiers'));
    }

    public function edit($id){
        $tier=Tier::findOrFail($id);
        $this->dispatch('editTier', $tier);
    }
}
