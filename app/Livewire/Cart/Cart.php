<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('livewire.cart.cart');
    }
    public function removeItem($id){
       $cart = session()->get('cart',[]);
       if(isset($cart[$id])) {
        unset($cart[$id]);
       }
       $this->dispatch('updateCartHeader');
       session()->put('cart',$cart);
    }
}
