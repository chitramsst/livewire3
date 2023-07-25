<?php

namespace App\Livewire\Service;

use Livewire\Component;

class ServiceIndex extends Component
{
    public $categories;
    public function render()
    {
        $this->categories = \App\Models\Category::latest()->get()->toArray();
        return view('livewire.service.service-index');
    }
}
