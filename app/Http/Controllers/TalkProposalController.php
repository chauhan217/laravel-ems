<?php

namespace App\Http\Controllers;

use App\Models\TalkProposal;
use Illuminate\Http\Request;
use App\Events\TalkProposalSubmitted;


class TalkProposalController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'speaker_id' => 'required|exists:speakers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('talk_proposals', 'public');
            $data['file_path'] = $filePath;
        }

        TalkProposal::create($data);
        broadcast(new TalkProposalSubmitted($talkProposal))->toOthers();

        return response()->json(['message' => 'Talk Proposal Submitted'], 201);
    }

    public function index()
    {
    $talkProposals = TalkProposal::with('speaker', 'reviews')->get();
    return response()->json($talkProposals);
    }

    public function show($id)
{
    $talkProposal = TalkProposal::with('speaker', 'reviews')->findOrFail($id);
    return response()->json($talkProposal);
}

public function statistics()
{
    $totalProposals = TalkProposal::count();
    $averageRating = Review::avg('rating');
    $proposalsPerTag = TalkProposal::select('tags', DB::raw('count(*) as total'))
        ->groupBy('tags')->get();

    return response()->json([
        'total_proposals' => $totalProposals,
        'average_rating' => $averageRating,
        'proposals_per_tag' => $proposalsPerTag,
    ]);
}

}
