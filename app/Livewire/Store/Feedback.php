<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use App\Models\Feedback as ModelsFeedback;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Feedback extends Component
{
    public $feedbacks;
    use TranslationsTrait;
    public function render()
    {   
        $this->feedbacks = ModelsFeedback::whereStoreId(Auth::user()->store->id)->latest()->get();
        return view('livewire.store.feedback')->layout('layouts.store');
    }
}