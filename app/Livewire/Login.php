<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use Livewire\Attributes\Rule;

class Login extends Component
{
    #[Rule('required')] 
    public $email;

    #[Rule('required')] 
    public $password;

    /* validation rules */
    // protected $rules = [
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ];
    /* render the page */
    public function render()
    {
        return view('livewire.login')->layout('components.layouts.login-layout');;
    }
    /* set the value at the time of render */
    public function mount(){
        /* if the user already logged in */
        if(Auth::user())
        {   
            /* admin auth redirect */
            if(Auth::user()->user_type == 1)
            {
                return redirect()->route('admin.dashboard');
            }
            /* store auth redirect */
            if(Auth::user()->user_type == 2)
            {
                return redirect()->route('store.dashboard');
            }
        }
    }
    /* login process of admin and store*/
    public function login()
    {
        /* validation */
        $this->validate();
        /* admin login */
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'user_type' => '1', 'is_active' => '1'])) {
            return redirect()->route('admin.dashboard');
        } 
        /* store login */
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'user_type' => '2','is_active' => '1'])) {
            /* store expiry checking */
            if(Auth::user()->store_expiry>\Carbon\Carbon::today()) {
                return redirect()->route('store.dashboard');
            } else {
                $this->addError('login_error', 'Store subscription is Expired. ');
            }
        }
        /* invalid authentication */
        else {
            $this->addError('login_error', 'User name and Password Invalid.');
        }
    }
    /* setup realtime validation */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
