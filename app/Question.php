<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'exam_id', 'correct_answer'
    ];

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }
}
