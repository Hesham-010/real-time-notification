<?php

namespace App\Listeners;

use App\Events\RegisterEvent;
use App\Models\User;
use App\Notifications\RegisterNotification;

class SendAdminNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterEvent $event): void
    {
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $admin->notify(new RegisterNotification($event->user));
        };
    }
}
