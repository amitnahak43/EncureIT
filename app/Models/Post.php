<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'execution_time'
    ];
}
