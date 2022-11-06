<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'Question';
    protected $fillable = ['team_id', 'user_id', 'question', 'answer', 'created_at', 'educare_num', 'resolution_flg'];
    public $timestamps = false;
}
