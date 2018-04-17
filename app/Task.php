<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'klak_tasks';
    protected $fillable = [
        'id_project',
        'name',
        'slug',
        'content',
        'status',
    ];
}
