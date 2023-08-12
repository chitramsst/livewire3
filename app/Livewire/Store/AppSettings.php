<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
class AppSettings extends Component
{
    use TranslationsTrait;
    use WithFileUploads;
    public $name,$phone,$email,$tax_percentage,$store_fees,$address,$description,$image,$facility_list;
    //render the page
    public function render()
    {
        return view('livewire.store.app-settings')->layout('layouts.store');
    }
   
    //prefill all inputs
    public function mount()
    {
        $store = Auth::user()->store;
        $this->name = $store->name;
        $this->phone = $store->phone;
        $this->email = $store->email;
        $this->tax_percentage = $store->tax_percentage;
        $this->store_fees = $store->store_fees;
        $this->address = $store->address;
        $this->description = $store->description;
        $this->facility_list = $store->facilities;
    }

    //save the data
    public function save()
    {
        $this->validate([
            'name'  => 'required',
            'phone' => 'required',
            'email' => 'required',
            'tax_percentage'    => 'required|numeric',
            'store_fees'    => 'required',
            'address'   => 'required',
            'description'   => 'required'
        ]);
        $store = Auth::user()->store;
        $store->name = $this->name;
        $store->phone = $this->phone;
        $store->email = $this->email;
        if($this->image){
            $default_logo = $this->image;
            $input['file'] = time().'.'.$default_logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/store');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['file']);
            $imageurl = '/uploads/store/'.$input['file'];
            $store->logo = $imageurl;
        }
        $store->tax_percentage = $this->tax_percentage;
        $store->store_fees = $this->store_fees;
        $store->address = $this->address;
        $store->description = $this->description;
        $store->save();
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'App settings have been updated!']);
    }

    //save facilities from javascript
    public function saveFacilities($fac)
    {
        $store = Auth::user()->store;
        $store->facilities = $fac;
        $store->save();
    }

    //cancel
    public function cancel()
    {
        $this->emit('refresh');
    }
}