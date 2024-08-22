<?php

namespace App\Models;

use App\Models\User;
use App\Models\Meeting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingParticipantEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'meeting_id',
        'user_id',
    ];

    protected $casts = [
        'meeting_id' => 'integer', 
        'user_id' => 'integer', 
    ];

    // Realtions
    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meeting_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
