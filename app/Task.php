<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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
    public function user() {
        return $this->hasMany('App\User', 'id_user');
    }

    /*———————————————————————————————————*\
                    myTasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Toutes les tâches du user authentifier
    */
    public function scopeMyTasks($query) {
        return $query
                ->where('id_user', Auth::id());
    }

    /*———————————————————————————————————*\
                myProjectTasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Toutes les tâches du user authentifier pour un projet spécifique
    */
    public function scopeProjectTasks($query, $idProject) {
        return $query
                ->where('id_project', $idProject);
    }

    /*———————————————————————————————————*\
                todo
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Tous les todos + count
    */
    public function scopeTodo($query) {
        $todo  = $query->where('status', 0)->get();

        return (object) [
            'tasks' => $todo,
            'count' => $todo->count(),
        ];
    }

    /*———————————————————————————————————*\
                doing
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Tous les doing + count
    */
    public function scopeDoing($query) {
        $doing = $query->where('status', 1)->get();

        return (object) [
            'tasks' => $doing,
            'count' => $doing->count(),
        ];
    }

    /*———————————————————————————————————*\
                done
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Tous les done + count
    */
    public function scopeDone($query) {
        $done  = $query->where('status', 2)->get();

        return (object) [
            'tasks' => $done,
            'count' => $done->count()
        ];
    }
}
