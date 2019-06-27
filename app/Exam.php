<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name', 'duration', 'schedule_time', 'duration'
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
