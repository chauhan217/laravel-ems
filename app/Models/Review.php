<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['reviewer_id', 'talk_proposal_id', 'comments', 'rating'];

    public function talkProposal()
    {
        return $this->belongsTo(TalkProposal::class);
    }

    
}
