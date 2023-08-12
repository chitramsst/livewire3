<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use App\Models\HouseKeeping as ModelsHouseKeeping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HouseKeeping extends Component
{
    use TranslationsTrait;
    public $house_keeping,$filter = 'all';
    public function render()
    {
        $query = ModelsHouseKeeping::whereStoreId(Auth::user()->store->id)->latest();
        if($this->filter == 'complete')
        {
            $query->whereStatus(1);
        }
        if($this->filter == 'incomplete')
        {
            $query->whereStatus(0);
        }
        $this->house_keeping = $query->get();
        return view('livewire.store.house-keeping')->layout('layouts.store');
    }

    public function changeStatusToSuccess($id)
    {
        $house_keeping = ModelsHouseKeeping::whereId($id)->first();
        if($house_keeping)
        {
            $house_keeping->status = 1;
            $house_keeping->save();
        }
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Status has been changed successfully!']);
    }

    public function changeFilter($text)
    {
        $this->filter = $text;
    }
}