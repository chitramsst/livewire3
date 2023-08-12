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
use Illuminate\Support\Str;

class AddRoom extends Component
{
    use WithFileUploads;
    use TranslationsTrait;
    public $image,$name,$price,$wifi,$max_occupants,$apartment_type,$smoking=1,$facilities = [],$is_active = 1,$description;
    public $wifi_list,$apartment_types,$apartment_facilities;
    
    //Render Page
    public function render()
    {
        return view('livewire.store.rooms.add-room')->layout('layouts.store');
    }

    //Load necessary data for view
    public function mount()
    {
        $this->wifi_list  = Wifi::latest()->get();
        $this->apartment_types = ApartmentType::latest()->get();
        $this->apartment_facilities = ApartmentFacility::orderBy('name','asc')->get();
    }

    //Save Rooms
    public function save()
    {
        $this->validate([
            'name'  => 'required',
            'price' => 'required',
            'max_occupants' => 'required|numeric',
            'apartment_type'    => 'required'
        ]);
        $i = 0;
        $slug = Str::slug($this->name);
        do{
            $i ++;
            if($i > 1)
            {
                $slug = Str::slug($this->name).Str::random($i);
            }
            else{
                $slug = Str::slug($this->name);
            }
        }
        while(Room::whereSlug($slug)->first());
        $room = new Room();
        $room->name = $this->name;
        $room->price = $this->price;
        $room->wifi = $this->wifi == '' ? null : $this->wifi;
        $room->max_occupants = $this->max_occupants;
        $room->smoking = $this->smoking?"1":0;
        $room->apartment_type = $this->apartment_type;
        $room->description = $this->description;
        $room->slug = $slug;
        $room->store_id = Auth::user()->store->id;
        $room->is_active = $this->is_active?"1":0;
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
            'alert-save', ['type' => 'success',  'message' => 'Room has been created!']);
        return redirect()->route('store.rooms');
    }

    //Reset input fields
    public function resetFields()
    {
        $this->name = '';
        $this->price = '';
        $this->wifi ;
        $this->max_occupants = '';
        $this->description = '';
        $this->smoking = 0;
        $this->facilities = [];
        $this->is_active = 1;
        $this->apartment_type = null;
    }
}