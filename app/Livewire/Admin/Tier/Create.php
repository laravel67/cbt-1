<?php

namespace App\Livewire\Admin\Tier;

use App\Models\Tier;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $isEditing = false;
    public $idTier;

    protected $listeners = [
        'editTier' => 'editTierHandler'
    ];

    public function render()
    {
        return view('pages.admin.tier.create');
    }

    public function store()
    {
        sleep(2);
        $this->validate([
            'name' => 'required|max:255|unique:tiers,name'
        ]);

        Tier::create([
            'name' => $this->name
        ]);
        $this->resetForm();
    }

    public function editTierHandler($tier)
    {
        $this->isEditing = true;
        $this->idTier = $tier['id'];
        $this->name = $tier['name'];
    }

    public function cancel()
    {
        $this->resetForm();
    }

    public function update()
    {
        sleep(2);
        $this->validate([
            'name' => 'required|max:255|unique:tiers,name,' . $this->idTier
        ]);

        $tier = Tier::find($this->idTier);

        if ($tier) {
            $tier->update([
                'name' => $this->name
            ]);

            $this->resetForm();
        }
    }
    private function resetForm()
    {
        $this->name = '';
        $this->idTier = '';
        $this->isEditing = false;
    }
}
