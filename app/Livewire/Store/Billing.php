<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\Subscription;
use Auth;

class Billing extends Component
{
    public $transactions;
    use TranslationsTrait;
    /* render the page */
    public function render()
    {
        $query = Transaction::where('user_id',Auth::user()->id)->where('status',1)->latest();
        $this->transactions = $query->select('transactions.*')->get();
        return view('livewire.store.billing')->layout('layouts.store');
    }
    /* renew current plan */
    public function renew(){
        $transaction = Transaction::whereUserId(Auth::user()->id)->where('status',1)->latest()->first();
        if($transaction) {
        $subscription = Subscription::where('id',$transaction->plan_id)->where('is_active',1)->first();
        if($subscription) {
        return redirect()->route('store.checkout',$subscription->id);
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Subscription unavailable. Please try some other subscriptin'
            ]);
        }
    } else {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => 'You dont have any subscription yet.',
        ]);
    }
    }
}
