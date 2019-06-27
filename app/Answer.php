<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'option_id', 'question_id', 'exam_id', 'user_id'
    ];
}
