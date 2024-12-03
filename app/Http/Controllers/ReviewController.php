<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\TalkProposal;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($talkProposalId)
    {
        $talkProposal = TalkProposal::findOrFail($talkProposalId);
        return view('reviews.create', compact('talkProposal'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'talk_proposal_id' => 'required|exists:talk_proposals,id',
            'reviewer_id' => 'required|exists:users,id',
            'comments' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($data);

        return response()->json(['message' => 'Review Submitted'], 201);
    }

    public function getReviews($id)
{
    $reviews = Review::where('talk_proposal_id', $id)->get();
    return response()->json($reviews);
}
}
