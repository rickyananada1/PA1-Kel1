<?php

namespace App\Providers;

use App\Listeners\notifikasiToAdmin;
use App\Listeners\sendToFAQ;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            notifikasiToAdmin::class,
            sendToFAQ::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
