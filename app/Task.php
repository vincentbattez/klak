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
}
