<?php

namespace App\Listeners;

use App\Mail\SendBackup;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Spatie\Backup\Events\BackupZipWasCreated;

class BackupZipWasCreatedListener
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
    public function handle(BackupZipWasCreated $event)
    {
        Mail::to('radoslav.tomas@gmail.com')->send(new SendBackup($event->pathToZip));
    }
}
