<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        // ?Daily login bonus task achieved
        // ?He later asked me to remove this feature
        // if ($user->last_login->diffInDays(Carbon::now()) >= 1) {
        //     $user->task_earnings += config('myglobals.daily_login_bonus');
        // }

        // Update user last login timestamp
        $user->last_login = Carbon::now()->toDateTime();
    }
}
