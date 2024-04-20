<?php

namespace App\Events;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestResult implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $data;
    public $flag;

    public function __construct($data,$flag)
    {
        $this->data = $data;
        $this->flag = $flag;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('test-result.' . $this->data->user_id);
    }

    public function broadcastAs()
    {
        return 'studentTestResult';
    }

    public function broadcastWith()
    {
        $notify = Notification::where('user_id',$this->data->user_id)->whereIn('type',['test-result-updated','test-result-uploaded'])->with('getUser')->orderBy('created_at','DESC')->first();
        return [
            'data' => $notify,
            'minutes' => Carbon::createFromTimestamp(strtotime($notify->created_at))->diffForHumans()
        ];
    }
}
