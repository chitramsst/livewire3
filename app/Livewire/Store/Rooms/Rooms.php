<?php

namespace App\Http\Livewire\Store\Rooms;

use App\Http\Livewire\Traits\TranslationsTrait;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rooms extends Component
{
    public $rooms;
    use TranslationsTrait;

    //Render the page and get rooms
    public function render()
    {
        $this->rooms = Room::whereStoreId(Auth::user()->store->id)->latest()->get();
        return view('livewire.store.rooms.rooms')->layout('layouts.store');
    }

    //Toggle the is active status of a room
    public function toggleStatus($id)
    {
        $room = Room::whereId($id)->first();
        if($room)
        {
            $room->is_active = !$room->is_active;
            $room->save();
        }
        if($room->is_active == 1)
        {
            $this->dispatchBrowserEvent(
                'alert', ['type' => 'success',  'message' => 'Room has been enabled!']);
        }
        else{
            $this->dispatchBrowserEvent(
                'alert', ['type' => 'success',  'message' => 'Room has been disabled!']);
        }
    }
}