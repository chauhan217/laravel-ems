<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Speaker;

class TalkProposalTest extends TestCase
{
    use RefreshDatabase;

    public function testCanSubmitTalkProposal()
    {
        $speaker = Speaker::factory()->create();

        $response = $this->postJson('/api/talk-proposals', [
            'speaker_id' => $speaker->id,
            'title' => 'Sample Proposal',
            'description' => 'This is a test description.',
            'tags' => 'Technology, Health',
        ]);

        $response->assertStatus(201)
                 ->assertJson(['message' => 'Talk Proposal Submitted']);
        $this->assertDatabaseHas('talk_proposals', ['title' => 'Sample Proposal']);
    }

    public function testCanFetchAllTalkProposals()
{
    $response = $this->getJson('/api/talk-proposals');

    $response->assertStatus(200)
             ->assertJsonStructure([
                 '*' => ['id', 'title', 'description', 'tags', 'status', 'speaker_id'],
             ]);
}

public function testTalkProposalBroadcast()
{
    $talkProposal = TalkProposal::factory()->create();

    broadcast(new TalkProposalSubmitted($talkProposal));

    $this->assertTrue(true); // Just testing the event doesn't throw errors
}
}
