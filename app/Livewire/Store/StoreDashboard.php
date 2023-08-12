<?php

namespace App\Http\Livewire\Store;

use App\Models\CheckIn;
use App\Models\CheckInPayment;
use App\Models\HouseKeeping;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\Traits\TranslationsTrait;

class StoreDashboard extends Component
{
    use TranslationsTrait;
    public $total_checkins,$available_rooms,$rooms_checked,$pending_house_keeping_requests,$payment_chart_data,$overdue_rooms;
    //render the page
    public function render()
    {
        return view('livewire.store.store-dashboard')->layout('layouts.store');
    }

    public function mount()
    {
        $this->total_checkins = CheckIn::whereStoreId(Auth::user()->store->id)->count();
        $this->available_rooms = Room::whereStoreId(Auth::user()->store->id)->whereDoesntHave('status_relation' , function ($query)  {
            return $query->whereStatus(1);
        })->count();
        $this->rooms_checked = Room::whereStoreId(Auth::user()->store->id)->whereHas('status_relation' , function ($query)  {
            return $query->whereStatus(1);
        })->count();
        $this->pending_house_keeping_requests = HouseKeeping::whereStoreId(Auth::user()->store->id)->whereStatus(0)->count();
        $finalData = [];
        $date = Carbon::today();
        for($iteration = 0; $iteration < 7; $iteration ++)
        {
            $data = [
                'x' => $date->toISOString(),
                'y' => CheckInPayment::whereStoreId(Auth::user()->store->id)->whereDate('created_at',$date->toDateString())->sum('amount')
            ];
            array_push($finalData,$data);
            $date = $date->subDay(1);
        }
        $this->payment_chart_data = $finalData;
        $this->overdue_rooms = Room::whereStoreId(Auth::user()->store->id)->whereHas('status_relation',function ($query)  {
            return $query->whereStatus(1);
        })->get();
        $finalOverdueData = [];
        foreach($this->overdue_rooms as $room)
        {
            $date = Carbon::today();
            $room->status_relation->load('checkin');
            $target_date = Carbon::parse($room->status_relation->checkin->checkout_date);
            if($date->floatDiffInDays($target_date,false) < 0){
               
                $item = [
                    'room' => $room->name,
                    'check_in_number'   => $room->status_relation->checkin->checkin_id,
                    'customer_name' => $room->status_relation->checkin->customer->name
                ];
                array_push($finalOverdueData,$item);
            }
        }
        $this->overdue_rooms = $finalOverdueData;
    }
}