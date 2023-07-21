<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Image;
use App\Models\Product as Item;

class Product extends Component
{
    use WithFileUploads;
 
    #[Rule('image|max:1024')] // 1MB Max
    public $photo;
 
    #[Rule('required')] 
    public $name = '';

    #[Rule('required|min:1')] 
    public $price = '';

    public function render()
    {
        return view('livewire.product.product');
    }
    public function save() {
        $this->validate();
        $product = new Item();
        $product->name = $this->name;
        if ($this->photo) {
            $image = $this->photo;
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $imgFile = Image::make($this->photo->getRealPath());
            $imgFile->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);
            $product->image_url = '/uploads/products/' . $input['file'];
        }
        $product->price = $this->price;
        $product->save();
        //$this->redirect('/product');
       // return redirect()->route('dashboard');
       return $this->redirect('/', navigate: true);
    }
}
