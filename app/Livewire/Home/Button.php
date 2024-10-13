<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Button extends Component
{
    public function render()
    {
        return view('pages.home.button');
    }

    public function starting(){
        sleep(2);
        $this->redirect(route('starting', absolute: false), navigate: true);
    }
}
