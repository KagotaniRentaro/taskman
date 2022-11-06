<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'Task';
    protected $fillable = ['user_id', 'task_id', 'content', 'del_flg'];
    public $timestamps = false;
}
