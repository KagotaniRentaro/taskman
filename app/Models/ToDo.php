<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'ToDo';
    protected $fillable = ['user_id', 'created_at', 'email', 'content', 'complete'];
    public $timestamps = false;
}
