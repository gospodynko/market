<?php

namespace App\Events;

use App\Models\Category;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CategoryEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $category;
    public function __construct(Category $category)
    {
        throw new \Dompdf\Exception();
        $this->category = $category;
        $this->updateSlug();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    private function updateSlug(){
        dd($this->category->toJson());
    }

    public function broadcastOn()
    {
//        dd($this->category->toJson());
    }
}
