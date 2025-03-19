<?php

namespace Innoboxrr\MakeBridge\Http\Events\MakeBridge\Listeners\ExportEvent;

use Innoboxrr\MakeBridge\Notifications\MakeBridge\ExportNotification;
use Innoboxrr\MakeBridge\Http\Events\MakeBridge\Events\ExportEvent;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExportNotification
{

    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {
        $event->user->notify((new ExportNotification($event->data))->locale($event->locale));
    }

}