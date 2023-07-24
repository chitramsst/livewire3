<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On; 

class Header extends Component
{
   // protected $listener= ['updateCartHeader','updateCart'];
    public function render()
    {
        return view('livewire.components.header');
    }
    #[On('updateCartHeader')] 
    public function updateCart(){
        $cart = session()->get('cart',[]);
    }
}
