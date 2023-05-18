<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['queue_id', 'state', 'start_time', 'end_time'];

    public function queue()
    {
        return $this->belongsTo(Queue::class);
    }
}