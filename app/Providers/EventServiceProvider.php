<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Listeners\DiscordNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    //Listener for Register
    protected $listen = [
        Registered::class => [
            DiscordNotification::class,
        ],
    ];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
