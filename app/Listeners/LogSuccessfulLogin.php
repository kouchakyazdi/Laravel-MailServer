<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class LogSuccessfulLogin
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
     * @param  Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        // set the default timezone to use. Available since PHP 5.1
        date_default_timezone_set('UTC');
        $event->user->last_login = date('Y-m-d H:i:s');
        $event->user->save();
    }
}

//date('Y-m-d H:i:s');