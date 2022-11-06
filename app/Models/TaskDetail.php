<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    protected $table = 'TaskDetail';
    protected $fillable = ['task_id', 'file', 'email', 'function', 'transition', 'post_tr', 'del_flg'];
    public $timestamps = false;
}
