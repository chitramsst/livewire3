<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $test = "ys";
    
    public function render()
    {
        return view('livewire.test');
    }
    public function save(){
        dd("fddsgfdg");
    }
}
