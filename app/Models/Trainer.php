<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'specialization', 'phone', 'salary'];

    public function workoutPlans()
    {
        return $this->hasMany(WorkoutPlan::class);
    }

    public function sessions()
    {
        return $this->hasMany(GymSession::class);
    }
}
