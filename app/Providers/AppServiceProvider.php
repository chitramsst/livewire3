<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Console\View\Components\Component as ComponentsComponent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bootMacros();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected function bootMacros()
    {
        Component::macro('modal', function ($text = null) {
            $this->js(<<<JS
            Swal.fire('','{$text}','success');
       JS);
        });
    }
}
