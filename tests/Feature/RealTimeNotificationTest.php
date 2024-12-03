<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Events\TalkProposalSubmitted;
use App\Models\TalkProposal;
use Illuminate\Support\Facades\Broadcast;

class RealTimeNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function testTalkProposalBroadcastEvent()
    {
        $talkProposal = TalkProposal::factory()->create();

        Broadcast::shouldReceive('event')
            ->once()
            ->with(new TalkProposalSubmitted($talkProposal));

        broadcast(new TalkProposalSubmitted($talkProposal));

        $this->assertTrue(true);
    }
}