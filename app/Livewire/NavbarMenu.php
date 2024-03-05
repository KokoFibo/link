<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NavbarMenu extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect('/', navigate: true);
    }
    public function render()
    {
        return view('livewire.navbar-menu');
    }
}
