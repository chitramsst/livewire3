<?php

namespace App\Livewire\Service;

use Illuminate\Support\Js;
use Livewire\Component;
use App\Models\Product;

class ServiceIndex extends Component
{
    public $categories;
    public $service_name,$products;
    public function render()
    {
        $this->categories = \App\Models\Category::latest()->get()->toArray();
        return view('livewire.service.service-index');
    }

    public function getProducts($id){
        $this->products = Product::where('id',$id)->latest()->get()->toArray();
    }

    public function save(){
       // $this->js('alert("js")');
    //    $this->js(<<<'JS'
    //         $wire.service_name = '';
    //         Swal.fire("hey");
    //    JS);
    $this->modal('test');
    }
}
