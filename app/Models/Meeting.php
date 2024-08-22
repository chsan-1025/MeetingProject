<?php

namespace App\Models;

use App\Enums\DepartmentEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\MeetingParticipantEmployee;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'organizer',
        'start_time',
        'end_time',
        'created_by',
        'department'
    ];

    protected $casts = [
        'title' => 'string',
        'organizer'=> 'string',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'created_by' => 'integer',
        'department' =>'string',
    ];

    // Relations
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function participants()
    {
        return $this->hasMany(MeetingParticipantEmployee::class, 'meeting_id');
    }

}
