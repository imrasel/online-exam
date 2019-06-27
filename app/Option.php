<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'title', 'question_id', 'option_id'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
