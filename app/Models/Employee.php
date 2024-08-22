<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'department' => 'string',
    ];
    
    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
