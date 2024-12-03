<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $fillable = ['talk_proposal_id', 'user_id', 'changes'];

    public function talkProposal()
    {
        return $this->belongsTo(TalkProposal::class);
    }
}
