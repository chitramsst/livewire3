<?php

namespace App\Http\Livewire\Store\Components;

use App\Http\Livewire\Traits\TranslationsTrait;
use Livewire\Component;
use Auth;

class Header extends Component
{
  use TranslationsTrait;
    /* render the page */
    public function render()
    {
        return view('livewire.store.components.header');
    }
      /* logout function */
      public function logout(){
        Auth::logout();
        return redirect()->route('login');
     }
}
