<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalkProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'speaker_id', 'title', 'description', 'tags', 'file_path', 'status',
    ];

    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
