<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'klak_projects';
    protected $fillable = [
        'id_user',
        'id_team',
        'name',
        'description',
        'img',
        'deadline',
        'created_at'
    ];
}


