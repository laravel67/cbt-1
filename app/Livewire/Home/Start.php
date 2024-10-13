<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Start extends Component
{
    public $tierName;
    public $slug;

    public function mount(){
        $this->slug=Auth::user()->tier->slug;
        $this->tierName=Auth::user()->tier->name;
    }

    public function render()
    {
        return view('pages.home.start');
    }

    public function startnow(){
        sleep(2);
        $this->redirect(route('start.quiz',['slug' => $this->slug], absolute: false), navigate: true);
    }

}
