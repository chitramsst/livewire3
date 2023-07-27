<?php

namespace App\Livewire;

use Livewire\Component;

class DragDrop extends Component
{
    public $products;
    
    public function render()
    {
        $this->products = \App\Models\Product::latest()->get();
        return view('livewire.drag-drop');
    }
}
