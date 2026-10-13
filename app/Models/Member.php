<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'date_of_birth', 'status'];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function workoutPlans()
    {
        return $this->hasMany(WorkoutPlan::class);
    }

    public function sessions()
    {
        return $this->hasMany(GymSession::class);
    }
}
