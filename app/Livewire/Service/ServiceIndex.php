<?php

namespace App\Livewire\Service;

use Illuminate\Support\Js;
use Livewire\Component;
use App\Models\Product;

class ServiceIndex extends Component
{
    public $categories;
    public $service_name,$products=null;
    public function render()
    {
        $this->categories = \App\Models\Category::latest()->get()->toArray();
        return view('livewire.service.service-index');
    }

    public function getProducts($id){
        //dd($id);    
        // $this->categories = null;
        // $this->products = null;
         $this->products = Product::where('id',$id)->latest()->get()->toArray();
    }

    public function getCategories(){
        $this->categories = \App\Models\Category::latest()->get()->toArray();
    }

    public function save(){
        //$this->modal("test");
       // $this->js('alert("js")');
    //    $this->js(<<<'JS'
    //         $wire.service_name = '';
    //         Swal.fire("hey");
    //    JS);
    //$this->modal('test');
    $this->confetti();
    }
}
