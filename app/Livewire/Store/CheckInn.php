<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use App\Models\CheckIn;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckInn extends Component
{
    use TranslationsTrait;
    public $checkIns;
    public function render()
    {
        $this->checkIns = CheckIn::whereStoreId(Auth::user()->store->id)->latest()->get();
        return view('livewire.store.check-inn')->layout('layouts.store');
    }
}