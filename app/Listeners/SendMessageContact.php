<?php

namespace App\Listeners;

use App\Events\RegisteredMessage;
use App\Mail\ContactSite;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMessageContact
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to(config('mail.from.address'))->send(new ContactSite($event->data));
    }
}
