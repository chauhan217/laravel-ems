<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TalkProposalSubmitted implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $talkProposal;

    public function __construct(TalkProposal $talkProposal)
    {
        $this->talkProposal = $talkProposal;
    }

    public function broadcastOn()
    {
        return new Channel('talk-proposals');
    }
}
