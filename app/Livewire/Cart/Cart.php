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

    public function incrementProductQuantity($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])) {
          $cart[$id]['product_quantity']++;
        }
        session()->put('cart',$cart);
    }

    public function decrementProductQuantity($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])) {
          $cart[$id]['product_quantity']--;
        }
        session()->put('cart',$cart);
    }
}
