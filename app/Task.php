<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'klak_tasks';
    protected $fillable = [
        'id_project',
        'id_user',
        'name',
        'status', // 0 = todo, 1 = doing, 2 = done
    ];

    /*———————————————————————————————————*\
                    Project
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  String
    
            @return    Le projet d'une tâche
    */
    public function project() {
        return $this->belongsTo('App\Project', 'id_project');
    }

    /*———————————————————————————————————*\
                    Tasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  []
    
            @return    Les tâches d'un user
    */
    public function tasks() {
        return $this->hasMany('App\User', 'id_user');
    }
}
