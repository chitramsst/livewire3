<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Auth;
class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.components.sidebar');
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
