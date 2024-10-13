<?php

namespace App\Livewire\Admin\Competitor;

use App\Models\Tier;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $isOpenForm = false;
    public $name, $email, $nisn, $name_schools, $old, $birthday, $tier_name, $tier_id, $image, $imageOld;

    public function mount()
    {
        $this->user = Auth::user();
        if (!$this->user || $this->user->role !== 'competitor') {
            abort(403, 'Akses ditolak');
        }

        // Load data directly from the user model
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->nisn = $this->user->nisn;
        $this->name_schools = $this->user->name_schools;
        $this->old = $this->user->old;
        $this->birthday = $this->user->birthday;
        $this->tier_id = $this->user->tier_id;
        $this->tier_name = $this->user->tier->name ?? '';
        $this->imageOld = $this->user->image;
    }

    public function openForm()
    {
        $this->isOpenForm = true;
    }

    public function closeForm()
    {
        $this->isOpenForm = false;
    }

    public function save()
{
    sleep(2);
    $this->validate([
        'name' => 'required|string|max:255',
        'nisn' => 'required|string|max:10|unique:users,nisn,' . $this->user->id,
        'tier_id' => 'required|exists:tiers,id',
        'birthday' => 'required|date',
        'old' => 'required|integer|digits_between:1,2',
        'name_schools' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024',
    ]);

    if ($this->image) {
        if ($this->imageOld) {
            Storage::delete($this->imageOld);
        }
        $path = $this->image->store('users', 'public');
        $this->imageOld = $path; 
    } else {
        $path = $this->imageOld;
    }

    // Update user details
    $this->user->update([
        'name' => $this->name,
        'nisn' => $this->nisn,
        'tier_id' => $this->tier_id,
        'birthday' => $this->birthday,
        'old' => $this->old,
        'name_schools' => $this->name_schools,
        'image' => $path,
    ]);

    $this->closeForm();
}


    public function render()
    {
        $tiers = Tier::all();
        return view('pages.admin.competitor.profile', compact('tiers'));
    }
}
