<?php

namespace App\Listeners;

use App\Events\RegisteredMessage;
use App\Mail\ContactSite;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMessageContact
{
    public $data;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = $event->data;
        Mail::to(config('mail.from.address'))->send(new ContactSite($data));
    }
}
