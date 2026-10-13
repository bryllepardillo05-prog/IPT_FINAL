<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['member_id', 'type', 'price', 'start_date', 'end_date'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
