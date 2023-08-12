<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Wifi as WifiComponent;
use Auth;
use App\Http\Livewire\Traits\TranslationsTrait;

class Wifi extends Component
{
    use TranslationsTrait;
    public $name,$password,$type=1,$selectedRowId;
    /* render the page */
    public function render()
    {
        $this->wifis = WifiComponent::latest()->get();
        return view('livewire.store.wifi')->layout('layouts.store');
    }
    /* validation rules */
    protected $rules = [
      "name" => 'required',
      "password" => 'required',
    ];
    /* save the data */
    public function save() {
        $this->validate();
        $wifi = new WifiComponent();
        $wifi->name = $this->name;
        $wifi->password = $this->password;
        $wifi->type = $this->type;
        $wifi->store_id = Auth::user()->id;
        $wifi->save();
        $this->resetData();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Wifi data added successfully.'
        ]);
    }
    /* public function resetData */
    public function resetData(){
        $this->resetErrorBag();
        $this->name = null;
        $this->password = null;
        $this->type =1 ;
        $this->selectedRowId = null;
        $this->emit('close-modal');
    }
      /* setup realtime validation */
      public function updated($propertyName)
      {
          $this->validateOnly($propertyName);
      }
      /* edit data setup */
      public function edit($row,$id) {
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->type = $row['type'];
        $this->selectedRowId = $row['id'];
        $this->emit('open-modal',$id);
      }
    /* update data */
    public function update() {
        $this->validate();
        $wifi = WifiComponent::find($this->selectedRowId);
        if($wifi) {
        $wifi->name = $this->name;
        $wifi->password = $this->password;
        $wifi->type = $this->type;
        $wifi->save();
        $this->resetData();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Wifi data updated successfully.'
        ]);
    }
    }
    /* confirm delete */
       public function confirmDelete($row){
        $this->selectedRowId = $row['id'];
        $this->emit('open-modal','deleteConfirmation');
     }
    /* delete data */
    public function delete() {
        $wifi = WifiComponent::find($this->selectedRowId);
        if($wifi) {
            $wifi->delete();
            $this->emit('close-modal');
            $this->wifis = WifiComponent::latest()->get();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Wifi data removed successfully.'
            ]);
        } 
    }
}
