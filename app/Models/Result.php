<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'survey_creater_id',
        'survey_taker_id',
        'question_id',
        'option_id',
        'question_type',
        'option_type',
        'option_value',
        'is_complete'
    ];
}
