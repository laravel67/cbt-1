<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function render()
    {
        return view('pages.auth.logout');
    }


    public function logout(){
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect(route('login', absolute: false), navigate: true);
    }
}
