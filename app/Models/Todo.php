<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'task',
        'description',
        'completed_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
