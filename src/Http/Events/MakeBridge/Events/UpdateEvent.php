<?php

namespace Innoboxrr\MakeBridge\Http\Events\MakeBridge\Events;

use Innoboxrr\MakeBridge\Models\MakeBridge;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $makeBridge;
    public $data;
    public $response;
    public $locale;

    public function __construct(MakeBridge $makeBridge, array $data, $response, $locale = 'en')
    {
        $this->makeBridge = $makeBridge;
        $this->data = $data;
        $this->response = $response;
        $this->locale = $locale;
        App::setLocale($this->locale);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

}