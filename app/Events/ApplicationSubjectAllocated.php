<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicationSubjectAllocated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message, $application, $seat_details;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $application, $seat_details)
    {
        $this->message = $message;
        $this->application = $application;
        $this->seat_details = $seat_details;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['merit-list-change'];
        // return new PrivateChannel('merit-list-change');
    }

    public function broadcastAs() {
        return 'subject-allocated-event';
    }
}
