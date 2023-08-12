<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use Livewire\Component;

class HotelInfo extends Component
{
    use TranslationsTrait;
    public function render()
    {
        return view('livewire.store.hotel-info')->layout('layouts.store');
    }
}
