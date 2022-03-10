<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'unique_id',
        'email',
        'user_type',
        'question_type',
        'end_date',
        'is_complete',
        'survey_id',
        'ip_address'
    ];
}
