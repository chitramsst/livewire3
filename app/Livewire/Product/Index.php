<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

/* https://webmobtuts.com/backend-development/creating-a-shopping-cart-with-laravel/ */

class Index extends Component
{
    public $items;

    const MINIMUM_QUANTITY = 1;

    public function render()
    {
        $this->items = Product::latest()->get();
        return view('livewire.product.index');
    }

    public function addToCart($row)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $row['id'] => [
                    'product_id' => $row['id'],
                    'product_name' => $row['name'],
                    'product_quantity' => 1,
                    'product_price' => $row['price']
                ]
            ];
            session()->put('cart', $cart);
        } else {
            if (isset($cart[$row['id']])) {
                $cart[$row['id']]['product_quantity']++;
                session()->put('cart', $cart);
            } else {
                $cart[$row['id']] = [
                    'product_id' => $row['id'],
                    'product_name' => $row['name'],
                    'product_quantity' => 1,
                    'product_price' => $row['price']
                ];
                session()->put('cart', $cart);
            }

            dd(session()->get('cart'));
        }
    }
}
