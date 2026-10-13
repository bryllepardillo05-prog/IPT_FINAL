<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymSession extends Model
{
    protected $table = 'gym_sessions';

    protected $fillable = ['member_id', 'trainer_id', 'session_time', 'status'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
