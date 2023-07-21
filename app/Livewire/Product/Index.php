<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $items;

    public function render()
    {
        $this->items = Product::latest()->get();
        return view('livewire.product.index');
    }
}
