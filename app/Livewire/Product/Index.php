<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Session;

// https://www.itsolutionstuff.com/post/laravel-shopping-add-to-cart-with-ajax-exampleexample.html
class Index extends Component
{
    public $items;
    public $search;

    const MINIMUM_QUANTITY = 1;

    public function render()
    {
        $this->items = Product::where('name','like','%'.$this->search.'%')->latest()->get();
        return view('livewire.product.index');

        // return view('livewire.product.index', [
        //     'items' => Product::latest()->get(),
        // ]);
    }

    /* add cart data */
    public function addToCart($row)
    {
        $id = $row['id'];
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {

            $cart[$id]['product_quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $row['id'],
                'product_name' => $row['name'],
                'product_quantity' => 1,
                'product_price' => $row['price'],
                'product_image_url' => $row['image_url']
            ];
        }
        session()->put('cart', $cart);
        //dd(session()->get('cart',[]));
        return redirect('product');
    }
}
