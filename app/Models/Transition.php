<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    protected $table = 'transition';
    protected $fillable = ['taskdetail_id', 'taskdetail_num', 'name', 'info'];
    public $timestamps = false;
}