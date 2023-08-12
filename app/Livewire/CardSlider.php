<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class CardSlider extends Component
{
    public function render()
    {
        return view('livewire.card-slider');
    }
    public $index;
    public $ids;
    public function next(){
        if($this->index < count($this->ids)-1){
            $this->index++;
        }
    }

    public function prev(){
        if($this->index > 0){
            $this->index--;
        }
    }

    public function goTo($pos){
        $this->index = $pos;
    }
    public function getUserProperty(){
        return User::find($this->ids[$this->index]);
    }

    public function mount(){
        $users = User::where('user_type','!=',1)->latest()->get();
        $this->ids = $users->pluck('id')->toArray();
        $this->index = 0;
    }
}
