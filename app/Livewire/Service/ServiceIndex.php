<?php

namespace App\Livewire\Service;

use Illuminate\Support\Js;
use Livewire\Component;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceDetail;

class ServiceIndex extends Component
{
    public $categories;
    public $service_name, $products=[];
    public $selectedIndex = null;
    public function render()
    {
        $this->categories = \App\Models\Category::latest()->get()->toArray();
        return view('livewire.service.service-index');
    }

    public function getProducts($id,$index)
    {
        $this->products[$index] = Product::where('id', $id)->latest()->get()->toArray();
    }

    public function getCategories()
    {
        $this->categories = \App\Models\Category::latest()->get()->toArray();
    }

    public function save($productList,$service_name)
    {
        
         $service = new Service();
         $service->service_name = $service_name;
         $service->save();
         
         foreach($productList as $row) {
            $detail = new ServiceDetail();
            $detail->product_id = $row['name'];
            $detail->price = $row['price'];
            $detail->category_id = $row['category_id'];
            $detail->service_id = $service->id;
            $detail->save();
         }

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
