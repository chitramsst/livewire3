<?php

namespace App\Http\Livewire\Store\Rooms;

use App\Http\Livewire\Traits\TranslationsTrait;
use App\Models\ApartmentFacility;
use App\Models\ApartmentType;
use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\Wifi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class EditRoom extends Component
{
    use WithFileUploads;
    use TranslationsTrait;
    public $image,$name,$price,$wifi,$max_occupants,$apartment_type,$smoking=1,$facilities = [],$is_active = 1,$description;
    public $wifi_list,$apartment_types,$apartment_facilities,$room;
    
    //Render Page
    public function render()
    {
        return view('livewire.store.rooms.edit-room')->layout('layouts.store');
    }

    //Prefill input fields
    public function mount($id)
    {
        $this->room = Room::whereStoreId(Auth::user()->store->id)->whereId($id)->first();
        if(!$this->room)
        {
            abort(404);
        }
        $this->name = $this->room->name;
        $this->price = $this->room->price;
        $this->wifi = $this->room->wifi;
        $this->max_occupants = $this->room->max_occupants;
        $this->apartment_type = $this->room->apartment_type;
        $this->smoking = $this->room->smoking;
        $this->wifi_list  = Wifi::latest()->get();
        $this->apartment_type = $this->room->apartment_type;
        $this->description = $this->room->description;
        $this->apartment_types = ApartmentType::latest()->get();
        $this->apartment_facilities = ApartmentFacility::orderBy('name','asc')->get();
        $this->is_active = $this->room->is_active;
        $data = RoomFacility::whereRoomId($this->room->id)->get();
        foreach($data as $item)
        {
            $this->facilities[$item->apartment_facility_id] = true;
        }
    }

    //update room
    public function save()
    {
        $this->validate([
            'name'  => 'required',
            'price' => 'required',
            'max_occupants' => 'required|numeric',
            'apartment_type'    => 'required'
        ]);
        $room = $this->room;
        $room->name = $this->name;
        $room->price = $this->price;
        $room->wifi = $this->wifi == '' ? null : $this->wifi;
        $room->max_occupants = $this->max_occupants;
        $room->smoking = $this->smoking?"1":0;
        $room->description = $this->description;
        $room->apartment_type = $this->apartment_type;
        $room->is_active = $this->is_active?"1":0;
        $room->store_id = Auth::user()->store->id;

        if($this->image){
            $default_logo = $this->image;
            $input['file'] = time().'.'.$default_logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/rooms');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['file']);
            $imageurl = '/uploads/rooms/'.$input['file'];
            $room->image = $imageurl;
        }
        $room->save();
        RoomFacility::whereRoomId($this->room->id)->delete();
        foreach($this->facilities as $fac => $value)
        {
            if($value == true)
            {
                $facility = new RoomFacility();
                $facility->room_id = $room->id;
                $facility->apartment_facility_id = $fac;
                $facility->save();
            }
        }
        $this->dispatchBrowserEvent(
            'alert-save', ['type' => 'success',  'message' => 'Room has been updated!']);
        return redirect()->route('store.rooms');
    }

    //reset input fields
    public function resetFields()
    {
        $this->name = '';
        $this->price = '';
        $this->wifi ;
        $this->max_occupants = '';
        $this->smoking = 0;
        $this->facilities = [];
        $this->is_active = 1;
        $this->apartment_type = null;
    }
}