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

    /*———————————————————————————————————*\
                    Tasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Toutes les tâches d'un projet
    */
    public function tasks()
    {
        return $this->hasMany('App\Task', 'id_project');
    }

    /*———————————————————————————————————*\
                    Team
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    La team d'un projet
    */
    public function team()
    {
        return $this->belongsTo('App\Team', 'id_team');
    }
}


