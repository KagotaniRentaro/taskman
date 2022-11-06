<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserDB extends Model
{
    protected $table = 'User';
    protected $fillable = ['id', 'name', 'email', 'password', 'team_id', 'login', 'role'];
    public $timestamps = false;
}