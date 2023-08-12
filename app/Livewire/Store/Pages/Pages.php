<?php

namespace App\Http\Livewire\Store\Pages;

use App\Http\Livewire\Traits\TranslationsTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pages extends Component
{
    public $privacy_policy,$terms_conditions;
    use TranslationsTrait;
    public function render()
    {
        return view('livewire.store.pages.pages')->layout('layouts.store');
    }

    //get data
    public function mount()
    {
        $this->privacy_policy = Auth::user()->store->privacy_policy;
        $this->terms_conditions = Auth::user()->store->terms_conditions;
    }

    //save data
    public function save()
    {
        $store = Auth::user()->store;
        $store->privacy_policy = $this->privacy_policy;
        $store->terms_conditions = $this->terms_conditions;
        $store->save();
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Pages has been updated!']);
    }
}