<?php

namespace App\Http\Livewire\Store;

use App\Models\Subscription as SubscriptionModel;
use Livewire\Component;
use App\Http\Livewire\Traits\TranslationsTrait;

class Subscription extends Component
{
    use TranslationsTrait;
    public $subscriptions;
    /* render the page */
    public function render()
    { 
        $this->subscriptions = SubscriptionModel::where('is_active',1)->latest()->get();
        return view('livewire.store.subscription')->layout('layouts.store');
    }
}
