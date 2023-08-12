<?php

namespace App\Http\Livewire\Store;

use App\Http\Livewire\Traits\TranslationsTrait;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCode2;

class QRCode extends Component
{
    use TranslationsTrait;
    public function render()
    {
        return view('livewire.store.q-r-code')->layout('layouts.store');
    }
}
