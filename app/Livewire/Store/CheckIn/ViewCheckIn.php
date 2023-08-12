<?php

namespace App\Http\Livewire\Store\CheckIn;

use App\Http\Livewire\Traits\TranslationsTrait;
use App\Models\CheckIn;
use App\Models\CheckInPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ViewCheckIn extends Component
{
    public $checkIn;
    use TranslationsTrait;
    public $amount,$payments,$remaining_balance,$total_paid;
    //render the page
    public function render()
    {
        $this->payments = CheckInPayment::whereCheckInId($this->checkIn->id)->latest()->get();
        $this->total_paid = CheckInPayment::whereCheckInId($this->checkIn->id)->sum('amount');
        $this->remaining_balance = $this->checkIn->total - $this->total_paid;
        return view('livewire.store.check-in.view-check-in')->layout('layouts.store');
    }

    //Load check in abort if the checkin is ot found
    public function mount($id)
    {
        $this->checkIn = CheckIn::whereStoreId(Auth::user()->store->id)->whereId($id)->first();
        if(!$this->checkIn)
        {
            abort(404);
        }
    }

    //Download ID Proof
    public function downloadId()
    {
        try{
            $path = public_path('/uploads/'.$this->checkIn->id_proof);
            return Storage::download($path);
        }
        catch(\Exception $e)
        {
            $this->dispatchBrowserEvent(
                'alert', ['type' => 'success',  'message' => 'Wait..Something went wrong during the download.']);
        }
    }

    //Add Payment
    public function addPayment()
    {
        $remaining_balance = CheckInPayment::whereCheckInId($this->checkIn->id)->sum('amount');
        $remaining_balance = $this->checkIn->total - $remaining_balance;
        $this->validate([
            'amount'    => 'required|numeric|lte:'.$remaining_balance
        ]);
        $payment = new CheckInPayment();
        $payment->check_in_id = $this->checkIn->id;
        $payment->store_id = Auth::user()->store->id;
        $payment->customer_id = $this->checkIn->customer_id;
        $payment->amount = $this->amount;
        $payment->payment_no = $this->generatePaymentNumber();
        $payment->save();
        $this->amount = '';
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Payment has been created successfully']);
    }

    //Fully Pay
    public function fullPayment()
    {
        $remaining_balance = CheckInPayment::whereCheckInId($this->checkIn->id)->sum('amount');
        $remaining_balance = $this->checkIn->total - $remaining_balance;
        if($remaining_balance <= 0)
        {
            $this->dispatchBrowserEvent(
                'alert', ['type' => 'success',  'message' => 'The check is already fully paid!']);
            return;
        }
        $payment = new CheckInPayment();
        $payment->check_in_id = $this->checkIn->id;
        $payment->store_id = Auth::user()->store->id;
        $payment->customer_id = $this->checkIn->customer_id;
        $payment->amount = $remaining_balance;
        $payment->payment_no = $this->generatePaymentNumber();
        $this->amount = '';
        $payment->save();
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'The check is now fully paid!']);
    }

    //generate a unique number for check in
    public function generatePaymentNumber()
    {
        $payment = CheckInPayment::latest()->first();
        if(!$payment)
        {
            return 1;
        }
        return $payment->payment_no + 1;
    }
}