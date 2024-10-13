<?php

namespace App\Livewire\Admin\Competitor;

use App\Models\Tier;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $select_row = 10;
    public $select_tier = '';
    public $search = '';

    public function render()
    {
        $query = User::where('role', 'competitor');
        if ($this->select_tier) {
            $query->where('tier_id', $this->select_tier);
        }
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('nisn', 'like', '%' . $this->search . '%');
            });
        }
        $competitors = $query->orderBy('name', 'asc')
                             ->paginate($this->select_row);
        $tiers = Tier::orderBy('id', 'desc')->get();
        return view('pages.admin.competitor.index', compact('competitors', 'tiers'));
    }
}
